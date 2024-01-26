<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paiementController extends Controller
{
    
  
    public function addPaiementBycodeBarre(Request $request)
    {
        $articles=DB::table('paiements')
                ->where([['idClient','=',$request->idClient],['idArticle','=',$request->barreCode],['idFacturation','=',0],['idValidate','=',' ']])
                ->exists();
        if(!$articles)
        {
            $validate=DB::table('articles')->where('codeArticle','=',$request->barreCode)->get();
            foreach($validate as $articleAvalider)
            {
    
                $paiement = new \App\Models\Paiement;
               // $paiement->id=$articleAvalider->id;
                $paiement->idClient=$request->idClient;
                $paiement->idArticle=$articleAvalider->codeArticle;
                $paiement->quantite=1;
        
                $quantite= new \App\Models\Stock;
                $stock=DB::table('stocks')->where([['stocks.nombreArticle','>=',1],['stocks.codeArticle','=',$articleAvalider->codeArticle] ])->get();
                compact('stock');
               foreach ($stock as $articles)
               {
        
                        if($articles->nombreArticle >=1)
                        {
                            
                            $pu= new \App\Models\referencePrix;
                            $pu=DB::table('reference_prixes')
                                    ->join('articles','articles.id','=','reference_prixes.idArticle')
                                    ->where('articles.codeArticle','=',$articleAvalider->codeArticle)->get();
                            foreach($pu as $pv)
                            {
                                $paiement->prixTotal=$pv->prixDeVente*1;
                                $paiement->idUser=session('utilisateurs')->idUser;
                                $paiement->datePaiement=date('Y-m-d H:i:s');
                                $paiement->idFacturation=0;
                                $paiement->idValidate=' ';
                                $paiement->caisse=0;
                                $paiement->save();
    
                                
                            } 
                        
                            return redirect()->action([clientController::class,'showClientAddPay']);
        
                        }
                        else{
        
                            return redirect()->action([clientController::class,'showClientAddPay']);
                        }
    
               }
    
               return redirect()->action([clientController::class,'showClientAddPay']);
    
            }
            return redirect()->action([clientController::class,'showClientAddPay']);
        }
        else if($articles){

            $validate=DB::table('articles')->where('codeArticle','=',$request->barreCode)->get();
            foreach($validate as $articleAvalider)
            {
                $articles=DB::table('paiements')
                    ->where([['idClient','=',$request->idClient],['idArticle','=',$request->barreCode],['idFacturation','=',0],['idValidate','=',' ']])
                    ->get();
                
                foreach($articles as $listeArticles)
                {
                    $pu= new \App\Models\referencePrix;
                    $pu=DB::table('reference_prixes')
                            ->join('articles','articles.id','=','reference_prixes.idArticle')
                            ->where('articles.codeArticle','=',$articleAvalider->codeArticle)->get();
                    foreach($pu as $pv)
                    {
                        
                        $paiement = new \App\Models\Paiement;
                        $paiement=$paiement->find($listeArticles->id);
                        $paiement->quantite=$paiement->quantite+1;
                        $paiement->prixTotal=$pv->prixDeVente* $paiement->quantite;
                        $paiement->save();

                        return redirect()->action([clientController::class,'showClientAddPay']);

                    }
                   
                    return redirect()->action([clientController::class,'showClientAddPay']);

                }
                return redirect()->action([clientController::class,'showClientAddPay']);

            }
                
            return redirect()->action([clientController::class,'showClientAddPay']);
        }
        
        return redirect()->action([clientController::class,'showClientAddPay']);
        
    }
    
    public function addPaiement(Request $request)
    {
       
        $request->validate([
            'idClient' => 'required',
            'idArticle' => 'required',
            'quantite' => 'required',
        ]); 

            $articles=DB::table('paiements')
                        ->where([['idClient','=',$request->idClient],['idArticle','=',$request->idArticle],['idFacturation','=',0],['idValidate','=',' ']])
                        ->exists();
            if(!$articles)
            {
                $paiement = new \App\Models\Paiement;
                $paiement->id=$request->id;
                $paiement->idClient=$request->idClient;
                $paiement->idArticle=$request->idArticle;
                $paiement->quantite=$request->quantite;
        
                $quantite= new \App\Models\Stock;
                $stock=DB::table('stocks')
                    ->where([['stocks.nombreArticle','>=',$request->quantite],['stocks.codeArticle','=',$request->idArticle] ])
                    ->get();
                compact('stock');
               foreach ($stock as $articles)
               {
        
                        if($articles->nombreArticle >= $request->quantite)
                        {
                            
                            $pu= new \App\Models\referencePrix;
                            $pu=DB::table('reference_prixes')
                                    ->join('articles','articles.id','=','reference_prixes.idArticle')
                                    ->where('articles.codeArticle','=',$request->idArticle)->get();
                            foreach($pu as $pv)
                            {
                                $paiement->prixTotal=$pv->prixDeVente*$request->quantite;
                                $paiement->idUser=session('utilisateurs')->idUser;
                                $paiement->datePaiement=date('Y-m-d H:i:s');
                                $paiement->idFacturation=0;
                                $paiement->idValidate=' ';
                                $paiement->caisse=0;
                                $paiement->save();
                            } 
                            return redirect()->action([clientController::class,'showClient']);
        
                        }
                        else{
        
                            return redirect()->action([clientController::class,'showClient']);
                        }
        
               }
                
            return redirect()->action([clientController::class,'showClient']);
    
            }
               
        return redirect()->action([clientController::class,'showClient']);
    }
    public function validation($codeArticle)
    {
        $validate=DB::table('paiements')->where([['idArticle','=',$codeArticle],['idValidate','=',' ']])->get();
        foreach($validate as $listeValidate)
        {
            $datas= new \App\Models\Paiement;
            $data=$datas->find($listeValidate->id);
            $data->idValidate="valider";
            $data->save();

            $quantite= new \App\Models\Stock;
            $stock=DB::table('stocks')
                    ->where([['stocks.nombreArticle','>=',$listeValidate->quantite],['stocks.codeArticle','=',$listeValidate->idArticle] ])
                    ->get();
            compact('stock');
            $benefice=DB::table('benefices')
                            ->join('stocks','benefices.idArticle','stocks.codeArticle')
                         ->where('idArticle','=',$codeArticle)->get();
              
                foreach($benefice as $benefices)
                {
                    $benefice= new \App\Models\Benefice;
                    $benefice=$benefice->find($benefices->id);

                    $prix=DB::table('benefices')
                            ->where([['idCommande','=',$benefices->idCommande],['idArticle','=',$codeArticle]])->get();
                    foreach($prix as $listePrix)
                    {
                        $prix= new \App\Models\Benefice;
                        $prix=$prix->find($listePrix->id);
                        $prix->nombreArticleVendue=$benefices->nombreArticleVendue+$listeValidate->quantite;
                        $prix->benefice=$prix->nombreArticleVendue*$benefices->differencePrice;
                        $prix->save();

                        $benefice=DB::table('benefices')
                            ->where('idCommande','=',$benefices->idCommande)->sum('benefice');
                        $gains=DB::table('benefice_by_articles')
                            ->where('idCommande','=',$benefices->idCommande)->get();
                        foreach($gains as $listeGains)
                        {
                            $gains= new \App\Models\BeneficeByArticle;
                            $gains=$gains->find($listeGains->id);
                            $gains->benefice=$benefice;
                            $gains->save();
    
                        }

                        
                    }
                   
                   

                }

            foreach($stock as $idStock)
            {
                $newQuantite = new \App\Models\Stock;
                $nvQuantite=$newQuantite->find($idStock->id);
                $nvQuantite->nombreArticle=$nvQuantite->nombreArticle-$listeValidate->quantite;
                $nvQuantite->save();

               
                $article=DB::table('articles')
                    ->where('codeArticle','=',$idStock->codeArticle)->get();
                foreach($article as $articles)
                {
                    $articl= new \App\Models\Articles;
                    $articl=$articl->find($articles->id);
                    $articl->totalSortie=$articl->totalSortie+$listeValidate->quantite;
                    $articl->save();
                }

              
                 
                       
                                
            }
          
             

            
   

           
        }
        return redirect()->action([paiementController::class,'showPaiementValidate']);
    }

    public function annulation($codeArticle)
    {
        $validate=DB::table('paiements')->where([['idArticle','=',$codeArticle],['idValidate','=',' ']])->get();
        foreach($validate as $listeValidate)
        {
            $datas= new \App\Models\Paiement;
            $data=$datas->find($listeValidate->id);
            $data->delete();
            return redirect('/showPay');

        }
    }
   
    public function showPaiement()
    {
        $articles=DB::table('articles')->get();
        $clients=DB::table('clients')->get();
        $paiement=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                    ->where([['paiements.idFacturation','=',0],['paiements.idValidate','=',' ']])->distinct()->get();
        
        $sorties=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->where([['paiements.idFacturation','=',0],['paiements.idValidate','!=',' ']])->get();
                    
        return view('layouts/formePaiement',compact('paiement','articles','clients','sorties'));
        
    }
    

    public function showPaiementValidate()
    {
        $articles=DB::table('articles')->get();
        $clients=DB::table('clients')->get();
        $paiement=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                    ->where([['paiements.idFacturation','=',0],['paiements.idValidate','=',' ']])->distinct()->get();
        
        $listepaye=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                    ->where([['paiements.idFacturation','=',0],['paiements.idValidate','!=',' '],['paiements.caisse','=',0]])->distinct()->get();

        $sorties=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->where('paiements.idFacturation','!=',0)->get();
        
        $paie=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                    ->where([['paiements.idFacturation','=',0],['paiements.idValidate','!=',' '],['paiements.caisse','=',0]])->sum('prixTotal');  

        return view('layouts/formeValidatePaiement',compact('paiement','articles','clients','sorties','paie','listepaye'));
        
    }

    public function showPaiementFacturation()
    {
        
        $paiement=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                    ->where([['paiements.idFacturation','=',0],['paiements.idValidate','!=',' ']])->get();

        return view('layouts/formeImprimerFacture',compact('paiement'));
        
    }

    public function showMontantFacture()
    {
      
        $paie=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                    ->where([['paiements.idFacturation','=',0],['paiements.idValidate','!=',' ']])->sum('prixTotal');

        return view('layouts/formeValidatePaiement',compact('paie'));
        
    }

    public function showEncaissement()
    {
        $encaissement=DB::table('facturations')
                ->join('caisses','caisses.idFacturation','=','facturations.idFacturation')
                ->join('utilisateurs','utilisateurs.idUser','=','caisses.idUser')
                ->paginate(10);

        return view('layouts/formeEncaissement',compact('encaissement'));
    }

    public function showEncaissements(Request $request)
    {
        $encaissement=DB::table('facturations')
                ->join('caisses','caisses.idFacturation','=','facturations.idFacturation')
                ->join('utilisateurs','utilisateurs.idUser','=','caisses.idUser')
                ->whereBetween('caisses.dateReglement',[$request->dateEncaissement, $request->dateEncaissement1])
                ->paginate(10);

        return view('layouts/formeEncaissement',compact('encaissement'));
    }


   
    
}
