<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class composerController extends Controller
{
    public function addComposer(Request $request)
    {
        
        $request->validate([
            'idCommande'=>'required',
            'idArticle' => 'required',
            'prixArticle' => 'required',
            'quantite' => 'required',
        ]); 
       
        $articles=DB::table('commandes')
                ->join('composers','composers.idCommande','=','commandes.id')
                ->where([['idCommande','=',$request->idCommande],['idArticle','=',$request->idArticle],['etatCommande','=',0]])
                ->exists();
        if(!$articles)
        {

            $composer = new \App\Models\Composer;
            $composer->id=$request->id;
            $composer->idCommande=$request->idCommande;
            $composer->idArticle=$request->idArticle;
            $composer->quantite=$request->quantite;
            $composer->dateCommande=date('Y-m-d');
            $composer->prixArticle=$request->prixArticle;
            $composer->verifierajout=0;
            $composer->save();


            $benefice = new \App\Models\Benefice;
            $benefice->idCommande=$request->idCommande;
            $benefice->idArticle=$request->idArticle;
            $benefice->nombreArticleVendue=0;

            $prix=DB::table('articles')
                    ->join('reference_prixes','articles.id','reference_prixes.idArticle')
                    ->where('articles.codeArticle','=',$request->idArticle)
                    ->get();
            
            foreach($prix as $listeprix)
            {
                $benefice->differencePrice=$listeprix->prixDeVente-$request->prixArticle;
                $benefice->benefice=0;
                $benefice->save();

            }
            Alert::question('Alert','Voulez vous ajouter une commande ?')
                    ->showConfirmButton('Oui','#3085d6')
                    ->showCancelButton('Non','#aaa')->reverseButtons();
            return redirect()->action([commandeController::class,'showFournisseur']);

        }
        else if($articles){
            return redirect()->action([commandeController::class,'showFournisseur']);
        }


        return redirect()->action([commandeController::class,'showFournisseur']);
    
    }
    public function modifierComposition(Request $request)
    {
        
        $datas= new \App\Models\Composer;
        $data=$datas->find($request->id);
        $data->idArticle=$request->idArticle;
        $data->quantite=$request->nombreArticle;
        $data->dateCommande=date('Y-m-d');
        $data->save();
        return redirect()->action([commandeController::class,'showCommande']);
    }
    public function supprimerArticleCommande(Request $request)
    {
        $datas= new \App\Models\Composer;
        $data=$datas->find($request->id);
        $data->delete();
        return redirect()->action([commandeController::class,'showCommande']);

    }
}
