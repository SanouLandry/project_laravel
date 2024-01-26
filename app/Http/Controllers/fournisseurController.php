<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validate;
use Illuminate\Pagination\Paginator;

class fournisseurController extends Controller
{
    public function addFournisseur(Request $request)
    {
        $request->validate([
            'nomFournisseur' => 'required',
            'prenomFournisseur' => 'required',
            'numeroTelephoneFournisseur' => 'required',
            'localiteFournisseur' => 'required',
            'emailFournisseur' => 'required',
        ]);
        $fournisseur = new \App\Models\Fournisseurs;
        $fournisseur->id=$request->id;
        $fournisseur->nom=$request->nomFournisseur;
        $fournisseur->prenom=$request->prenomFournisseur;
        $fournisseur->numeroTelephone=$request->numeroTelephoneFournisseur;
        $fournisseur->localite=$request->localiteFournisseur;
        $fournisseur->email=$request->emailFournisseur;
        $fournisseur->save();
        return view('layouts/formeAddFournisseur');
    } 

    public function showFournisseur()
    {
        $fournisseurs=DB::table('fournisseurs')->paginate(5);
        return view('layouts/formeListeFournisseurs',compact('fournisseurs'));
    }

   
}
