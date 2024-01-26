<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class caisseController extends Controller
{
    public function addCaisse(Request $request)
    {
         $request->validate([
            'idClient' => 'required',
            'montantFacture' => 'required',
            'montantEncaisse' => 'required',
        ]); 

        $caisse = new \App\Models\Caisse;
        $caisse->idClient=$request->idClient;
        $caisse->montantFacture=$request->montantFacture;
        $caisse->montantEncaisse=$request->montantEncaisse;
        if($request->montantEncaisse >$request->montantFacture || $request->montantEncaisse==$request->montantFacture)
        {
            $caisse->monnaie=$request->montantEncaisse-$request->montantFacture;
            $caisse->dateReglement=date('Y-m-d H:i:s');
            $caisse->idFacturation=0;
            $caisse->idUser=session('utilisateurs')->idUser;
            $caisse->save();


            $paiement=DB::table('paiements')
                ->where([['idClient','=',$request->idClient],['caisse','=',0]])->get();
                foreach($paiement as $listepaiement)
                {
                    $paye= new \App\Models\Paiement;
                    $paye=$paye->find($listepaiement->id);
                    $paye->caisse=1;
                    $paye->save();
                }


            

            
        }


       





        return redirect('/showPay');

        
    }
}
