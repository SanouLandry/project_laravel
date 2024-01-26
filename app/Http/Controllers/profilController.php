<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class profilController extends Controller
{
    public function addProfil(Request $request)
    {
       /*  $request->validate([
            'nameProfil' => 'required',
            'j_entree_sortie' => 'required',
            'etat_stock' => 'required',
            'bd_articles' => 'required',
            'gestion_paie' => 'required',
            'gestion_factures' => 'required',
            'gestion_paiement' => 'required',
            'gestion_fournisseurs' => 'required',
        ]); */
        
        $profil = new \App\Models\Profil;
        $profil->id=$request->id;
        $profil->groupeProfil=$request->NameProfil;
        $profil->jres=$request->j_entree_sortie;
        $profil->get=$request->etat_stock;
        $profil->gbda=$request->bd_articles;
        $profil->gpai=$request->gestion_paie;
        $profil->gfac=$request->gestion_factures;
        $profil->gpaie=$request->gestion_paiement;
        $profil->gfour=$request->gestion_fournisseurs;
        $profil->save();

        return redirect('/addProfil');

    }
   


    
  
}
