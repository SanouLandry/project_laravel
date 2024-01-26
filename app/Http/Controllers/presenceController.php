<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class presenceController extends Controller
{
    public function addPresence(Request $request)
    {
        $request->validate([
            'idUser'=>'required',
            'idPresence' => 'required',
            
        ]); 
        $presence = new \App\Models\Presence;
        $presence->id=$request->id;
        $presence->idUser=$request->idUser;
        $presence->dateArriver=date('Y-m-d H:i:s');
        $presence->dateSortie=date('Y-m-d');
        $presence->save();
        return view('layouts/presence');
    }
    
    public function showPresence()
    {
        $presences=DB::table('presences')
                    ->join('utilisateurs','utilisateurs.idUser','=','presences.idUser')
                    ->join('profils','utilisateurs.id','=','profils.id')
                    ->paginate(5);
        return view('layouts/listePresence',compact('presences'));
    }
}
