<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class statController extends Controller
{

    public function getNombreProfil()
    {
        $nombreProfil=DB::table('profils')->count();
        $nombreUser=DB::table('utilisateurs')->count();

        return view('layouts/index',compact('nombreProfil','nombreUser'));
    }

    public function getArticle()
    {
        $nbArticleCategorie=DB::table('articles')
                ->join('stocks','stocks.codeArticle','=','articles.codeArticle')
                ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                ->get();
        $fournisseurs=DB::table('fournisseurs')->count();
        $articles=DB::table('articles')->count();
        $listecategories=DB::table('categoriesarticles')->count();
        $clients=DB::table('clients')->count();
        return view('layouts/dashboard',compact('listecategories','articles','clients','fournisseurs','nbArticleCategorie'));

        
    }

    public function getStatistiques()
    {
        $statistique=DB::table("articles")
                    ->join('categoriesarticles','categoriesarticles.idCategorie','=','articles.idCategorieArticle')
                    ->join('statventes','articles.codeArticle','=','statventes.idArticle')
                    ->where('statventes.dateVente','=',NOW()->format('Y-m-d'))
                    ->paginate(10);

        return view('layouts/statistiquesventearticles',compact('statistique'));
    }


    public function getStatistique(Request $request)
    {
        $statistique=DB::table("articles")
                    ->join('categoriesarticles','categoriesarticles.idCategorie','=','articles.idCategorieArticle')
                    ->join('statventes','articles.codeArticle','=','statventes.idArticle')
                    ->where('libelleArticle','like',"%$request->articleRechercher%")->orwhere('libelleCategorie','like',"%$$request->articleRechercher%")
                    ->whereBetween('dateVente',[$request->dateVente, $request->dateVente1])
                    ->paginate(10);

        return view('layouts//search_statistiques',compact('statistique'));
    }

    

  
}
