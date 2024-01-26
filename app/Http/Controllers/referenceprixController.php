<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class referenceprixController extends Controller
{
    public function addReferencePrix(Request $request)
    {
        $request->validate([
            'idArticle' => 'required',
            'priceMarket' => 'required',
            'priceSale' => 'required',
        ]);

        $reference = new \App\Models\referencePrix;
            $idReferenceprix=rand(1,12500);
            $reference->id=$idReferenceprix;
            $reference->idArticle=$request->idArticle;
            $reference->prixDuMarché=$request->priceMarket;
            $reference->prixDeVente=$request->priceSale;
            if( $reference->prixDeVente >$reference->prixDuMarché || $reference->prixDeVente == $reference->prixDuMarché)
            {
                $reference->save();
                $datas = new \App\Models\Articles;
                $data=$datas->find($request->idArticle);
                $data->idReferencePrix=$idReferenceprix;
                $data->save();
            }
            return redirect('/addPrixArticle');
    }
    public function showPrix()
    {
        $articles=DB::table('articles')
                ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
                ->get();
        return view('layouts/formeReferencePrix',compact('articles'));
        
    }
    public function setArticlePrixReference($idReferenceprix)
    {
        $prix=DB::table('reference_prixes')->find($idReferenceprix);
        return view('layouts/modifierArticlesPrix',compact('prix'));

    }

    public function modifierPrix(Request $request)
    {
        $datas= new \App\Models\referencePrix;
        $data=$datas->find($request->id);
        $data->prixDuMarché=$request->prixDuMarche;
        $data->prixDeVente=$request->prixDeVente;
        if($data->prixDeVente >  $data->prixDuMarché ||$data->prixDeVente == $data->prixDuMarché )
        {
            $data->save();
        }
        return redirect()->action([referenceprixController::class,'showPrix']);
    }
}
