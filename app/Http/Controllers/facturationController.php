<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use PDF;

class facturationController extends Controller
{
    
    public function showFacturation(Request $request)
    {
        $clients=DB::table('clients')->get();

       
        $paiement=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('facturations','facturations.idFacturation','=','paiements.idFacturation')
                    ->where([['facturations.facturePdf','=',1],['paiements.idClient','=',$request->idClient]])
                    ->paginate(10);

        $sorties=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.id')
                    ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('facturations','facturations.idFacturation','=','paiements.idFacturation')
                    ->where('facturations.facturePdf','!=',0);
        return view('layouts/formeFacture',compact('paiement','sorties','clients'));
        
    }
    public function getFacturation(Request $request)
    {
        $clients=DB::table('clients')->get();
         
        $paiement=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('facturations','facturations.idFacturation','=','paiements.idFacturation')
                    ->where([['facturations.facturePdf','=',1],['paiements.idClient','=',$request->idClient]])
                    ->paginate(10);
        return view('layouts/searchFacture',compact('paiement','clients'));
    }
    

    public function printFacture(Request $request)
    {
        $request->validate([
            'idClient' => 'required',
        ]); 
       ;
        
        $paie=DB::table('paiements')
                    ->join('facturations','paiements.idFacturation','=','facturations.idFacturation')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('utilisateurs','utilisateurs.idUser','=','paiements.idUser')
                    ->join('articles','articles.codeArticle','=','paiements.idArticle')
                    ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                    ->where([['paiements.idClient','=',$request->idClient],['facturations.facturePdf','=',0]])
                    ->get();
        compact('paie');
       
       
        foreach($paie as $paiement)
        {
            //echo $paiement->idFacturation;
            
            $facture= new \App\Models\Facturation;
            $facture=DB::table('facturations')->where('idFacturation','=',$paiement->idFacturation);
            $facture->etat;

            //$facture->save();
            $pdf=PDF::loadView('layouts/facture',compact('paie'));
           return $pdf->download('facture'.$paiement->idFacturation.'.pdf'); 
        }       
       

      
    }


    public function addFacturation(Request $request)
    {

        $request->validate([
            'idClient' => 'required',
            'datePaiement' => 'required',
        ]); 
        $idFacturation=rand(1,199999999);
      
       $datas=DB::table('paiements')
                        ->join('clients','clients.idClient','=','paiements.idClient')
                        ->where([ ['paiements.idClient','=',$request->idClient], ['paiements.idFacturation','=',0]])
                        ->get();
        if($datas)
        {
            $facture= new \App\Models\Facturation;
            foreach($datas as $listePaiement)
            {
               
                $paie=new \App\Models\Paiement;
                $paiement=$paie->find($listePaiement->id);
                $paiement->idFacturation=$idFacturation;
                $paiement->save();

                $statventes=DB::table('statventes')
                        ->where('idArticle','=',$listePaiement->idArticle)->get();
                        
                foreach($statventes as $listestat)
                {

                        $stat = new \App\Models\statvente;
                        $stat = $stat->find($listestat->id);
                        $stat->montant=$stat->montant+$listePaiement->prixTotal;
                        $stat->dateVente=$listePaiement->datePaiement;
                        $stat->save();
                }
                        


                $caisse=DB::table('caisses')
                    ->where([['idClient','=',$listePaiement->idClient],['idFacturation','=',0]])->get();
                foreach($caisse as $caisses)
                {
                    $caiss= new \App\Models\Caisse;
                    $caiss=$caiss->find($caisses->id);
                    $caiss->idFacturation=$idFacturation;
                    $caiss->save();
                }

                $facture->id=$request->id;
                $facture->idFacturation=$idFacturation;
                $facture->montantTotal=$listePaiement->prixTotal+$facture->montantTotal;
                $facture->facturePdf=1;
                $facture->etat=0;
                $facture->token_paiement=$listePaiement->id.rand(10,19999).$idFacturation;
                $facture->nomClient=$listePaiement->nomClient;
                $facture->prenomClient=$listePaiement->prenomClient; 
                $facture->numeroTelephone=$listePaiement->numeroTelephone; 
                $facture->datePaiement=$listePaiement->datePaiement; 
            }
            $facture->save();

           
        }

        $montantTotal=DB::table('facturations')->where('idFacturation','=',$idFacturation)->get();

        $montant=DB::table('caisses')->where('idFacturation','=',$idFacturation)->get();
        $paie=DB::table('paiements')
                ->join('facturations','facturations.idFacturation','=','paiements.idFacturation')
                ->join('utilisateurs','utilisateurs.idUser','=','paiements.idUser')
                ->join('articles','articles.codeArticle','=','paiements.idArticle')
                ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                ->where([['paiements.idClient','=',$request->idClient],['facturations.idFacturation','=',$idFacturation]])
                ->distinct()->get();
        $pdf=PDF::loadView('layouts/facture',compact('paie','montantTotal','montant'));
        return $pdf->download('facture'.$idFacturation.'.pdf'); 
        
        return redirect('/main');

    }

    public function getFacture($id)
    {
        $montantTotal=DB::table('facturations')->where('idFacturation','=',$id)->get();
        $montant=DB::table('caisses')->where('idFacturation','=',$id)->get();
        $paie=DB::table('paiements')
                ->join('articles','paiements.idArticle','=','articles.codeArticle')
                ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                ->join('clients','clients.idClient','=','paiements.idClient')
                ->join('facturations','facturations.idFacturation','=','paiements.idFacturation')
                ->where([['facturations.facturePdf','=',1],['paiements.idFacturation','=',$id]])
                ->get();
        $facture=PDF::loadView('layouts/facture',compact('paie','montantTotal','montant'));
        return $facture->download('facture'.$id.'.pdf');
    }

   
}
