<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class clientController extends Controller
{
    public function addClient(Request $request)
    {
         $request->validate([
            'nomClient' => 'required',
            'prenomClient' => 'required',
            'numeroTelephone' => 'required',
            'emailClient' => 'required',
            'localiteClient' => 'required',
        ]); 
        $client = new \App\Models\Client;
        $client->idClient=$request->id;
        $client->nomClient=$request->nomClient;
        $client->prenomClient=$request->prenomClient;
        $client->numeroTelephone=$request->numeroTelephone;
        $client->email=$request->emailClient;
        $client->localite=$request->localiteClient;
        $client->save();
        return redirect('/addClient');
    }
    public function showClient()
    {
        $articles=DB::table('articles')
                ->get();
        $clients=DB::table('clients')->get();
        return view('layouts/formeAddPaiement',compact('clients','articles'));
    }

    public function showClientAddPay(Request $request)
    {
        $price=DB::table('articles')
            ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
            ->where('articles.codeArticle','=',$request->barreCode)->get();
        foreach($price as $prix)
        {
            session()->flash('success',"Le prix de l'article est:$prix->prixDeVente");
        }
        $clients=DB::table('clients')->get();
        return view('layouts/formeScan',compact('clients','price'));
    }

    public function getClient()
    {
        $clients=DB::table('clients')->paginate(10);
        return view('layouts/formeListeClient',compact('clients'));
    }
}
