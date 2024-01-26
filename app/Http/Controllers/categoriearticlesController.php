<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoriearticlesController extends Controller
{
    public function addCategorie(Request $request)
    {
        
        $request->validate([
            'libelleCategorie' => 'required',
            'refCategorie' => 'required',
        ]);
        $categorie = new \App\Models\categoriesarticles;
        $categorie->idCategorie=$request->idCategorie;
        $categorie->libelleCategorie=$request->libelleCategorie;
        $categorie->refCategorie=$request->refCategorie;
        $categorie->save();
        return redirect('/addCategorie');
    }

    public function showCategorie()
    {
        
        $articles=DB::table('articles')->whereNotIn('id',function($query)
        {
            $query->select('idArticle')->from('reference_prixes');
        })->get();

        return view('layouts/formeAddPrixArticle',compact('articles'));
    }
    public function showCategorieArticle()
    {
        $categories=DB::table('categoriesarticles')->get();
        return view('layouts/formeAjoutArticle',compact('categories'));
    }
    public function NombreCategorie()
    {
        $nombreCategorie=DB::table('categoriesarticles')->count();
        return view('layouts/billing',['nombreCategorie'=>$nombreCategorie]);
    } 
}
