<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use PDF;

class salaireController extends Controller
{
    public function showUser()
    {
        $salaires=DB::table('utilisateurs')
                    ->join('salaires','salaires.idUser','=','utilisateurs.idUser')
                    ->join('profils','utilisateurs.id','=','profils.id')
                    ->paginate(5);
        $user=DB::table('utilisateurs')->distinct()->get();
        return view('layouts/rtl',compact('user','salaires'));
    }
    public function addSalaire(Request $request)
    {
        
       $request->validate([

            'idUser' => 'required',
            'salaireBase' => 'required',
            'indemnites' => 'required',
            'retenues' => 'required',

        ]);
        $idSalaire=rand(1,19999999);
        $salaire = new \App\Models\Salaire;
        $salaire->id=$request->id;
        $salaire->idSalaire=$idSalaire;
        $salaire->idUser=$request->idUser;
        $salaire->salaireBase=$request->salaireBase;
        $salaire->indemnites=$request->indemnites;
        $salaire->avanceSurSalaire=$request->retenues;
        $salaire->salairePercu=$request->salaireBase+$request->indemnites-$request->retenues;
        $salaire->datePaiement=date('Y-m-d H:i:s');
        if($request->salaireBase >$request->indemnites)
        {
            if($salaire->salairePercu)
            {
                $salaire->save();
            }

                
            
        }

        return redirect()->action([salaireController::class,'showUser']);


    }
    public function printSalaire($id)
    {
        $salaires=DB::table('salaires')
                ->join('utilisateurs','salaires.idUser','=','utilisateurs.idUser')
                ->join('profils','utilisateurs.id','=','profils.id')
                ->where('salaires.idSalaire','=',$id)
                ->get();
        $salaires=PDF::loadView('layouts/forme_salaire',compact('salaires'));
        return $salaires->download('salaire_'.$id.'.pdf');
    }
}
