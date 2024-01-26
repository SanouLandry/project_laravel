<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Pagination\Paginator;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CommandeExport;


class commandeController extends Controller
{
    public function creerCommande(Request $request)
    {
        $request->validate([
            'idFournisseur' => 'required',
            'libelleCommande' => 'required',
            'referenceCommande' => 'required',
            'typeCommande' => 'required',
        ]); 

       
        $idCommande=rand(1,100000);
        $commande = new \App\Models\Commande;
        $commande->id=$idCommande;
        $commande->idFournisseur=$request->idFournisseur;
        $commande->libelleCommande=$request->libelleCommande;
        $commande->referenceCommande=$request->referenceCommande;
        $commande->etatCommande=0;
        $commande->bonDeCommande=0;
        $commande->typeCommande=$request->typeCommande;
        $commande->prixTotal=0;
        $commande->montantPaye=0;
        $commande->monnaieRecu=0;
        $commande->validate=0;
        $commande->montantCharge=0;
        $commande->save();


            Alert::Question('Alert','Voulez vous ajouter un produit ?')
            ->showConfirmButton('Oui','#3085d6')
            ->showCancelButton('Non','#aaa')->reverseButtons();
        
        return redirect()->action([commandeController::class,'showFournisseur']);
    }
    public function showArticleFournisseur()
    {
        $liste=DB::table('articles')->get();
        return view('layouts/formeCommande',compact('liste'));
    }
    public function showFournisseur()
    {
        $liste=DB::table('articles')->get();
        $fournisseur=DB::table('fournisseurs','articles')->get();
        $commandes=DB::table('commandes')->where('etatCommande','=','0')->get();
        return view('layouts/formeCommande',compact('fournisseur','liste','commandes'));
    }
    public function showCommande()
    {
        $montantCommande=DB::table('commandes')->where('etatCommande','=',0)->sum('prixTotal');
        $listeCommande=DB::table('commandes')->where('etatCommande','=',0)->get();
        $commandes=DB::table('commandes')
                    ->join('fournisseurs','fournisseurs.id','=','commandes.idFournisseur')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.codeArticle','=','composers.idArticle')
                    ->where('etatCommande','=',0)
                    ->paginate(10);
        return view('layouts/listeCommande',compact('commandes','listeCommande','montantCommande'));
    }

    public function rechercherCommande(Request $request)
    {
        $montantCommande=DB::table('commandes')->where('etatCommande','=',0)->sum('prixTotal');
        $listeCommande=DB::table('commandes')->where('etatCommande','=',0)->get();
        $commandes=DB::table('commandes')
                    ->join('fournisseurs','fournisseurs.id','=','commandes.idFournisseur')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.codeArticle','=','composers.idArticle')
                    ->where('etatCommande','=',0)
                    ->paginate(10);
        return view('layouts/searchCommandes',compact('commandes','listeCommande','montantCommande'));
    }

    public function getCommandeRechercher(Request $request)
    {
        $commandeRechercher=$request->idCommande;
        $commandes=DB::table('commandes')
                    ->join('fournisseurs','fournisseurs.id','=','commandes.idFournisseur')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.codeArticle','=','composers.idArticle')
                    ->where([['idCommande','=',$commandeRechercher],['etatCommande','=',0]])
                    ->paginate(10);
        $montantCommande=DB::table('commandes')->where('etatCommande','=',0)->sum('prixTotal');
        return view('layouts/searchcommande',compact('commandes','montantCommande'));
    }
    

    public function showDataCommande($id)
    {
        $liste=DB::table('articles')->get();
        $commande=DB::table('composers')
                    ->find($id);
        return view('layouts/modifierCommande',compact('commande','liste'));
    }

    public function getListCommande()
    {

        $commandes=DB::table('commandes')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.id','=','composers.idArticle')->get();
        $listecommandes=PDF::loadView('layouts/liste_Commande',compact('commandes'));
        return $listecommandes->download('liste_commandes.pdf');
    }

    public function exportCommande()
    {
        return Excel::download(new CommandeExport,'export_commande.xlsx');

    }

    public function showCommandePourEntree()
    {
        $listeCommande=DB::table('commandes')->where('etatCommande','=',0)->get();
        $commandes=DB::table('commandes')
                    ->join('fournisseurs','fournisseurs.id','=','commandes.idFournisseur')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.codeArticle','=','composers.idArticle')
                    ->where('etatCommande','=',0)
                    ->paginate(10);
        $commande=DB::table('commandes')
                    ->join('fournisseurs','fournisseurs.id','=','commandes.idFournisseur')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.codeArticle','=','composers.idArticle')
                    ->where([['etatCommande','=',1],['validate','=',0]])
                    ->paginate(10);
        $montantCommande=DB::table('commandes')
                    ->where([['etatCommande','=',1],['validate','=',0]])
                    ->sum('prixTotal');
        return view('layouts/tables',compact('commandes','commande','montantCommande'));

    }
    public function showCommandePourSortie(Request $request)
    {

        $sorties=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('facturations','facturations.idFacturation','=','paiements.idFacturation')
                    ->where('facturations.facturePdf','=',1)->whereBetween('paiements.datePaiement',[$request->dateSortie, $request->dateSortie1])
                    ->orderby('paiements.datePaiement')->paginate(10);
        return view('layouts/search_vente',compact('sorties'));

    }
    public function showCommandePourSorties()
    {

        $sorties=DB::table('paiements')
                    ->join('articles','paiements.idArticle','=','articles.codeArticle')
                    ->join('reference_prixes','reference_prixes.id','=','articles.idReferencePrix')
                    ->join('clients','clients.idClient','=','paiements.idClient')
                    ->join('facturations','facturations.idFacturation','=','paiements.idFacturation')
                    ->where('facturations.facturePdf','=',1)
                    ->orderby('paiements.datePaiement')->paginate(10);
        return view('layouts/search_vente',compact('sorties'));

    }

    public function showCommandeEtEtatStock()
    {
        $entreeSortie=DB::table('articles')
                ->Join('stocks','stocks.codeArticle','=','articles.codeArticle')
                ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                ->orderby('libelleArticle')->distinct()->paginate(10);
        return view('layouts/etatStock',compact('entreeSortie'));

        
    }

    public function showEtatVente()
    {
        $etatvente=DB::table('articles')
                    ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                    ->join('paiements','articles.codeArticle','=','paiements.idArticle')
                    ->join('utilisateurs','utilisateurs.idUser','=','paiements.idUser')
                    ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                                
                        ->paginate(10);
        return view('layouts/etatVente',compact('etatvente'));
       
    }

    public function showEtatVenteParDate(Request $request)
    {
        $etatvente=DB::table('articles')
                        ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                        ->join('paiements','articles.codeArticle','=','paiements.idArticle')
                        ->join('utilisateurs','utilisateurs.idUser','=','paiements.idUser')
                        ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                        ->whereBetween('paiements.datePaiement',[$request->dateVente, $request->dateVente1])
                        ->paginate(10);
        return view('layouts/search_etatVente',compact('etatvente'));
       
    }

    public function showCommandeEtEtatStockArticle(Request $request)
    {
        $entreeSortie=DB::table('articles')
                        ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                        ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                        ->where('libelleArticle','like',"%$request->articleRechercher%")->orwhere('libelleCategorie','like',"%$$request->articleRechercher%")->paginate(10);
                    return view('layouts/etatStock',compact('entreeSortie'));
    }
    public function showMontantCaisse(Request $request)
    {
        $soldeCaisse=DB::table('facturations')->whereBetween('facturations.datePaiement',[$request->dateDebut, $request->dateFin])
                        ->sum('montantTotal');
        return view('layouts/search_etatSolde',compact('soldeCaisse'));
    }
    public function showEtatCaisse()
    {
        $soldeCaisse=DB::table('facturations')->where('datePaiement','=',NOW()->format('Y-m-d'))->sum('montantTotal');

        return view('layouts/etatSolde',compact('soldeCaisse'));
    }


    public function modifyEtatCommande(Request $request)
    {
        $request->validate([
            'idCommande' => 'required',
        ]); 
       

        $composer= new \App\Models\Composer;
        $composer=DB::table('composers')
                    ->join('articles','composers.idArticle','=','articles.codeArticle')
                     ->where('idCommande','=',$request->idCommande)->get();
        compact('composer');

        $commande= new \App\Models\BeneficeByArticle;
        $commande->idCommande=$request->idCommande;
        $commande->benefice=0;
        $commande->save();
            
            $stock = DB::table('stocks')
                    ->where([['stocks.nombreArticle','==',0]])
                    ->get();

            foreach($stock as $listeStock)
            {
                foreach($composer as $key =>$listeComposer)
                {
            
                    if($listeStock->codeArticle==$listeComposer->idArticle)
                    {
                        

                        $datas= new \App\Models\Commande;
                        $data=$datas->find($request->idCommande);
                        $data->etatCommande=1;
                        $data->prixTotal=$data->prixTotal+($listeComposer->quantite*$listeComposer->prixArticle);
                        $data->save();
        
                        $article= new \App\Models\Articles;
                        $article=$article->find($listeComposer->id);
                        $article->totalEntree=$article->totalEntree+$listeComposer->quantite;
                        $article->save();
        
        
                        $stock = new \App\Models\Stock;
                        $stock=$stock->find($listeStock->id);
                        $stock->nombreArticle=$stock->nombreArticle+$listeComposer->quantite;
                        $stock->idCommande=$request->idCommande;
                        $stock->save();    
                        //return redirect()->action([commandeController::class,'showCommandePourEntree']);
        
                        

                    }
                    else{
                        //return redirect()->action([commandeController::class,'showCommandePourEntree']);
        

                        
                    }
                    
               

                    //return redirect()->action([commandeController::class,'showCommandePourEntree']);
    

            }
            //return redirect()->action([commandeController::class,'showCommandePourEntree']);
         
        }

        return redirect()->action([commandeController::class,'showCommandePourEntree']);
    }


    public function paiementCommande(Request $request)
    {
        $request->validate([
            'idCommande' => 'required',
            'montantCommande' => 'required',
            'montantPaye' => 'required',
            'montantCharge' => 'required',
        ]);
        $datas= new \App\Models\Commande;
        $data=$datas->find($request->idCommande);
        $data->montantPaye=$request->montantPaye;
        $data->monnaieRecu=$request->montantPaye-$data->prixTotal;
        $data->validate=1;
        $data->montantCharge=$request->montantCharge;
        if($request->montantPaye>$request->montantCommande || $request->montantPaye==$request->montantCommande)
        {
            $data->save();

            //$benefice = new \App\Models\Benefice;
            //$benefice->montantRecette=0;
            //$benefice->montantDepense=$request->montantCharge+$request->montantCommande;
            //$benefice->benefice=0;
            //$benefice->save();

            return redirect()->action([commandeController::class,'showCommandePourEntree']);
        }
        return redirect()->action([commandeController::class,'showCommandePourEntree']);
        
    }

    public function getListeCommandes()
    {
        $listeCommande=DB::table('commandes')->where([['etatCommande','=',1],['validate','=',1]])->get();
        $commandes=DB::table('commandes')
                    ->join('fournisseurs','fournisseurs.id','=','commandes.idFournisseur')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.codeArticle','=','composers.idArticle')
                    ->where([['etatCommande','=',1],['validate','=',1]])
                    ->paginate(10);

       
        return view('layouts/commandesbyarticles',compact('commandes','listeCommande'));
    }

    public function getListeCommandesbyArticles(Request $request)
    {
        $listeCommande=DB::table('commandes')->where([['etatCommande','=',1],['validate','=',1]])->get();
        $commandes=DB::table('commandes')
                    ->join('fournisseurs','fournisseurs.id','=','commandes.idFournisseur')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.codeArticle','=','composers.idArticle')
                    ->where([['etatCommande','=',1],['validate','=',1],['idCommande','=',$request->idCommande]])
                    ->paginate(10);
        
      

      
        return view('layouts/search_listecommandes',compact('commandes','listeCommande'));
    }

    public function getFullListCommandes()
    {
        $listeCommande=DB::table('commandes')->where([['etatCommande','=',1],['validate','=',1]])->get();
        $articlescommandes=DB::table('commandes')
                ->where([['etatCommande','=',1],['validate','=',1]])
                ->paginate(10);
        return view('layouts/listeCommandesValider',compact('articlescommandes','listeCommande'));
    }

    public function getFullListCommande(Request $request)
    { 
        $listeCommande=DB::table('commandes')->where([['etatCommande','=',1],['validate','=',1]])->get();
         $articlescommandes=DB::table('commandes')
                ->where([['commandes.etatCommande','=',1],['commandes.validate','=',1],['commandes.id','=',$request->idCommande]])
                ->paginate(10);
        return view('layouts/search_listeCommandesValider',compact('articlescommandes','listeCommande'));
    }

   
}
