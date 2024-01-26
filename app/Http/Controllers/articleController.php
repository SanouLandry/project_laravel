<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArticleExport;
use App\Exports\CategorieExport;
use DNS1D;
use PDF;

class articleController extends Controller
{
    public function addArticle(Request $request)
    {
      /*   $request->validate([

            'idCategorieArticle' => 'required',
            'libelleCategorie' => 'required',
            'referenceCategorie' => 'required',
            'quantiteMax' => 'required',
            'quantiteMin' => 'required',

        ]); */
        $codeProduct=rand(1068900122, 100000000);
        $idstock=rand(1,59999);
        $article = new \App\Models\Articles;
        $article->id=$request->id;
        $article->idReferencePrix=0;
        $article->idStock=$idstock;
        $article->idCategorieArticle=$request->idCategorieArticle;
        $article->libelleArticle=$request->libelleArticle;
        $article->referenceArticle=$request->referenceArticle;
        $article->quantiteMax=$request->quantiteMax;
        $article->quantiteMin=$request->quantiteMin;
        $article->codeArticle=$codeProduct;
        $article->codeBarre=DNS1D::getBarcodeHTML($codeProduct,'CODABAR');
        $article->totalEntree=0;
        $article->totalSortie=0;

        if($article->quantiteMax >  $article->quantiteMin)
        {

            $article->save();

            $stock = new \App\Models\Stock;
            $stock->id=$idstock;
            $stock->codeArticle=$codeProduct;
            $stock->nombreArticle=0;
            $stock->idCommande=0;
            $stock->save();


            
            $stat = new \App\Models\statvente;
            $stat->id=0;
            $stat->idArticle=$codeProduct;
            $stat->montant=0;
           
            $stat->save();


        }
        return redirect('/addArticleCategorie')->with("Article ajouté avec succès! ");
    }
    
    public function showArticle()
    {
        $articles=DB::table('articles')
                    ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                    ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
                    ->paginate(10);
        return view('layouts/listeArticles',compact('articles'));
    }

    public function showCategorie()
    {
        $listecategories=DB::table('categoriesarticles')->get();

        $categories=DB::table('articles')
                    ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                    ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
                    ->paginate(10);
        return view('layouts/listeCategories',compact('categories','listecategories'));
    }


    public function showData($idArticle)
    {
        $articles=DB::table('articles')
                    ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
                    ->where('articles.id','=',$idArticle)->get();
        return view('layouts/modifierArticles',compact('articles'));
    }

    public function modifierArticle(Request $request)
    {

        $codeProduct=rand(1068900122, 100000000);
        $datas= new \App\Models\Articles;
        $data=$datas->find($request->id);
        $data->libelleArticle=$request->libelleArticle;
        $data->referenceArticle=$request->referenceArticle;
        $data->quantiteMax=$request->quantiteMax;
        $data->quantiteMin=$request->quantiteMin;
        $data->codeArticle=$codeProduct;
        $data->codeBarre=DNS1D::getBarcodeHTML($codeProduct,'CODABAR');
        $data->save();

       
      /*   $dataPrice= new \App\Models\referencePrix;
        $dataPrice=DB::table('reference_prixes')->where('idArticle','=',$request->id)->get();
        compact('dataPrice');
        $dataPrice->idArticle=$request->id;
        $dataPrice->prixDuMarché=$request->priceMarket;
        $dataPrice->prixDeVente=$request->priceSale;
        $dataPrice->save(); */
        
        return redirect()->action([articleController::class,'showArticle']);
    }
    public function supprimerArticle(Request $request)
    {
        $datas= new \App\Models\Articles;
        $data=$datas->find($request->idArticle);
        $data->delete();
//        $prix= new \App\Models\referencePrix;
  //      $prix=$prix->find($request->idArticle);
    //    $prix->delete();
        return redirect()->action([articleController::class,'showArticle']);

    }
    public function rechercherArticle(Request $request)
    {
        $articleRechercher=$request->input('articleRechercher');
        $articles=DB::table('articles')
                    ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                    ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
                    ->where('libelleArticle','like',"%$articleRechercher%")->orwhere('libelleCategorie','like',"%$articleRechercher%")->paginate(10);
        return view('layouts/searchArticle',compact('articles'));
    }

    public function rechercherCategorie(Request $request)
    {
        $listecategories=DB::table('categoriesarticles')->get();
        
        $categorierechercher=$request->categorieRechercher;
        $categories=DB::table('articles')
                    ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                    ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
                    ->where('idCategorie','like',"%$categorierechercher%")->paginate(10);
        return view('layouts/search_categories',compact('categories','listecategories'));
    }

    public function getCodeBarre()
    {

        $articles=DB::table('articles')
                ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')->get();
        $listecodebarre=PDF::loadView('layouts/list_codebarre_articles',compact('articles'));
        return $listecodebarre->download('liste_codebarre_articles.pdf');
    }
    
    public function getListArticle()
    {

        $articles=DB::table('articles')
                ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')->get();
        $listearticles=PDF::loadView('layouts/liste_articles',compact('articles'));
        return $listearticles->download('liste_articles.pdf');
    }

    public function exportArticle()
    {
        return Excel::download(new ArticleExport,'export_article.xlsx');

    }
    public function exportCategorie()
    {
        return Excel::download(new CategorieExport,'export_categorie.xlsx');

    }
    public function printCodebarre($idArticle)
    {
        $codebarre=DB::table('articles')
                ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                ->where('articles.id','=',$idArticle)
                ->get();
        $codebarre=PDF::loadView('layouts/codebarre',compact('codebarre'));
        return $codebarre->download('codebarre_articles.pdf');
        
    }

    


    
}
