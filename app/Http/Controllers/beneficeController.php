<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class beneficeController extends Controller
{
    public function addBenefice(Request $request)
    {
        $benefice = new \App\Models\Benefice;
        $benefice->montantRecette=0;
        $benefice->montantDepense=$request->montantFacture;
        $caisse->montantEncaisse=$request->montantEncaisse; 

        $depenses=DB::table('commandes')
                   ->get();
        
        foreach($depenses as $listeDepenses)
        {
            
        }
        
        $caisse=DB::table('caisses')
                ->get();


    }

    public function showBenefice()
    {
       
        $PrixTotal=DB::table('commandes')->sum('prixTotal');
        $montantCharge=DB::table('commandes')->sum('montantCharge');
        $coutGlobal=$PrixTotal+$montantCharge;
        $recetteGlobal=DB::table('paiements')->sum('prixTotal');
        $beneficeGlobal=$recetteGlobal-$coutGlobal;

        $benefice=DB::table('benefices')
                    ->join('articles','benefices.idArticle','=','articles.codeArticle')
                    ->join('commandes','commandes.id','=',"benefices.idCommande")
                    ->paginate(10);
        return view('layouts/formeBenefice',compact('benefice'));
    }

    public function showBenefices(Request $request)
    {
       
        $PrixTotal=DB::table('commandes')->sum('prixTotal');
        $montantCharge=DB::table('commandes')->sum('montantCharge');
        $coutGlobal=$PrixTotal+$montantCharge;
        $recetteGlobal=DB::table('paiements')->sum('prixTotal');
        $beneficeGlobal=$recetteGlobal-$coutGlobal;

        $benefice=DB::table('benefices')
                    ->join('articles','benefices.idArticle','=','articles.codeArticle')
                    ->join('commandes','commandes.id','=',"benefices.idCommande")
                    ->where('libelleCommande','like',"%$request->commandeRechercher%")->orwhere('libelleArticle','like',"%$request->commandeRechercher%")
                    ->paginate(10);
        return view('layouts/search_benefices',compact('benefice'));
    }
    

    public function showBeneficeGlobal()
    {
        $PrixTotal=DB::table('commandes')->sum('prixTotal');
        $montantCharge=DB::table('commandes')->sum('montantCharge');
        $coutGlobal=$PrixTotal+$montantCharge;
        $recetteGlobal=DB::table('paiements')->sum('prixTotal');
        $beneficeGlobal=$recetteGlobal-$coutGlobal;
        return view('layouts/formeBeneficeGlobal',compact('coutGlobal','recetteGlobal','beneficeGlobal'));
    }

    public function showBeneficeByCommande()
    {
        $commande=DB::table('commandes')->where('etatCommande','=',1)->get();
        $gain=DB::table('benefice_by_articles')
                    ->join('commandes','commandes.id','=','benefice_by_articles.idCommande')
                    ->where('commandes.etatCommande','=',1)
                    ->paginate(10);
        return view('layouts/formeshowbenefice',compact('gain','commande'));   
    }
    public function showBeneficeByCommandes(Request $request)
    {
        $commande=DB::table('commandes')->where('etatCommande','=',1)->get();
        $gain=DB::table('benefice_by_articles')
                    ->join('commandes','commandes.id','=','benefice_by_articles.idCommande')
                    ->where([['commandes.etatCommande','=',1],['commandes.id','=',$request->idCommande]])
                    ->paginate(10);
        return view('layouts/search_showbenefice',compact('gain','commande'));   
    }
}
