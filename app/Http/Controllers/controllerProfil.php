<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class controllerProfil extends Controller
{
    public function afficherProfil()
    {
        $profiles=DB::table('profils')->get();
        return view('layouts/vr',compact('profiles'));
    }

    public function showProfil()
    {
        $profils=DB::table('profils')->get();
        return view('layouts/sign-up',compact('profils'));
    } 

    public function showData($id)
    {
        $profiles=DB::table('profils')->find($id);
        return view('layouts/modifierProfil',compact('profiles'));
    }

    public function modifier(Request $request)
    {
        $datas= new \App\Models\Profil;
        $data=$datas->find($request->id);
        $data->groupeProfil=$request->NameProfil;
        $data->jres=$request->j_entree_sortie;
        $data->get=$request->etat_stock;
        $data->gbda=$request->bd_articles;
        $data->gpai=$request->gestion_paie;
        $data->gfac=$request->gestion_factures;
        $data->gpaie=$request->gestion_paiement;
        $data->gfour=$request->gestion_fournisseurs;
        $data->save();
        return redirect()->action([controllerProfil::class,'afficherProfil']);
    }

}
