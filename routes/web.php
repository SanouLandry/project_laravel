<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\profilController;
use App\Http\Controllers\controllerProfil;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoriearticlesController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\fournisseurController;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\composerController;
use App\Http\Controllers\referenceprixController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\paiementController;
use App\Http\Controllers\facturationController;
use App\Http\Controllers\presenceController;
use App\Http\Controllers\salaireController;
use App\Http\Controllers\statController;
use App\Http\Controllers\caisseController;
use App\Http\Controllers\beneficeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts/main');
});
Route::get('/main', function () {
    return view('master');
});
Route::get('/home', function () {
    return view('layouts/dashboard');
});

Route::get('/tables', function () {
    return view('layouts/tables');
})->name('tables');

Route::get('/billings', function () {
    return view('layouts/billing');
});

Route::get('/rtl', function () {
    return view('layouts/rtl');
});

Route::get('/notifications', function () {
    return view('layouts/notifications');
})->name('notifications');

Route::get('/profile', function () {
    return view('layouts/profile');
})->name('profile');

Route::get('/register', function () {
    return view('layouts/sign-up');
});

Route::get('/sign-in', function () {
    return view('layouts/sign-in');
})->name('signin');

Route::get('/pay', function () {
    return view('layouts/formeListeClient');
});

Route::get('/facture', function () {
    return view('layouts/formeFacture');
});

Route::get('/tables', function () {
    return view('layouts/tables');
});

Route::get('/sorties', function () {
    return view('layouts/formeSortie');
});

Route::get('/addClient', function () {
    return view('layouts/formeAjoutClient');
});

Route::get('/addPay', function () {
    return view('layouts/formeAddPaiement');
});

Route::get('/scan', function () {
    return view('layouts/formeScan');
});

Route::get('/etatSolde', function () {
    return view('layouts/etatSolde');
});

Route::get('/vr',[controllerProfil::class,'afficherProfil'])->name('vr');

Route::post('/AddProfil',[profilController::class,'addProfil']);

Route::get('edit_profiles/{id}',[controllerProfil::class,'showData']);

Route::post('/vr',[controllerProfil::class,'modifier'])->name('modifierProfil');

Route::get('/register',[controllerProfil::class,'showProfil']);

Route::post('/register',[userController::class,'addUser']);

Route::post('/seConnecter',[userController::class,'seConnecter']);



Route::post('/edit_profile',[userController::class,'modifierUser']);

Route::post('/add_categorie',[categoriearticlesController::class,'addCategorie']);


Route::post('/add_article',[articleController::class,'addArticle']);




Route::get('edit_article/{idArticle}',[articleController::class,'showData']);

Route::post('/liste_articles',[articleController::class,'modifierArticle'])->name('ModifierArticle');
Route::get('del_article/{idArticle}',[articleController::class,'supprimerArticle']);

Route::get('/search_articles',[articleController::class,'rechercherArticle']);

Route::get('/search_categories',[articleController::class,'rechercherCategorie']);


Route::get('/get_codebarre',[articleController::class,'getCodeBarre']);

Route::get('/list_articles',[articleController::class,'getListArticle']);

Route::get('/liste_article',[articleController::class,'exportArticle']);

Route::get('/liste_categories',[articleController::class,'exportCategorie']);

///Les routes fournisseurs et commandes

Route::get('/fournisseurs', function () {
    return view('layouts/forme_fournisseurs');
});

Route::get('/addFournisseur', function () {
    return view('layouts/formeAddFournisseur');
});

Route::get('/addProfil', function () {
    return view('layouts/formulaire_creation_profil');
});

Route::post('/add_fournisseur',[fournisseurController::class,'addFournisseur']);

Route::get('/commandes',[commandeController::class,'showFournisseur']);

Route::post('/add_commandes',[commandeController::class,'creerCommande']);

Route::post('/add_articles_commandes',[composerController::class,'addComposer']);

Route::get('/add_articles_commandes',[composerController::class,'addComposer']);

Route::get('/list_commandes',[commandeController::class,'showCommande']);

Route::post('/search_commandes',[commandeController::class,'rechercherCommande']);

Route::get('edit_commande/{id}',[commandeController::class,'showDataCommande']);

Route::post('/list_commandes',[composerController::class,'modifierComposition'])->name('modifierCommande');

Route::get('del_commande/{id}',[composerController::class,'supprimerArticleCommande']);

Route::get('/getlist_commandes',[commandeController::class,'getListCommande']);

Route::get('/getlist_commandes',[commandeController::class,'exportCommande']);

Route::get('/searchcommandes',[commandeController::class,'getCommandeRechercher']);


//les routes pour les entrees et les sorties
Route::get('/tables',[commandeController::class,'showCommandePourEntree']);
Route::get('/sorties',[commandeController::class,'showCommandePourSortie']);

Route::get('/sorties',[commandeController::class,'showCommandePourSorties']);


Route::post('/encaisser',[caisseController::class,'addCaisse']);

Route::post('/validate',[commandeController::class,'modifyEtatCommande']);


//Les routes pour reference article
Route::post('/addPrixArticle',[referenceprixController::class,'addReferencePrix'])->name('addReferenceArticle');


//Les routes pour les clients

Route::post('/add_client',[clientController::class,'addClient']);
Route::get('/addPay',[clientController::class,'showClient']);

Route::get('/scan',[clientController::class,'showClientAddPay']);






Route::get('/search_etatSolde',[commandeController::class,'showMontantCaisse']);

Route::get('/etatStock',[commandeController::class,'showCommandeEtEtatStock']);

Route::get('/search_etatArticle',[commandeController::class,'showCommandeEtEtatStockArticle']);

Route::post('/scannage',[paiementController::class,'addPaiementBycodeBarre']);

Route::post('/add_pay',[paiementController::class,'addPaiement']);

Route::get('/etatSolde',[commandeController::class,'showEtatCaisse']);



Route::get('/showPay', function () {
    return view('layouts/formeValidatePaiement');
});

Route::get('/showPay',[paiementController::class,'showPaiementValidate']);

Route::post('/facturation',[facturationController::class,'addFacturation']);


Route::get('/facture',[facturationController::class,'showFacturation']);


Route::get('/out',[userController::class,'SeDeconnecter']);

Route::get('/presence', function () {
    return view('layouts/presence');
});

Route::post('/add_presence',[presenceController::class,'addPresence']);

Route::get('/list_presence',[presenceController::class,'showPresence']);


Route::get('print_codebarre/{id}',[articleController::class,'printCodebarre']);


Route::post('/print',[facturationController::class,'printFacture']);


//Les routes pour le salaire

Route::get('/rtl',[salaireController::class,'showUser']);

Route::post('/salary',[salaireController::class,'addSalaire']);

Route::get('printSalaire/{id}',[salaireController::class,'printSalaire']);

//Les routes pour les statistiques
Route::get('/accueil', function () {
    return view('layouts/index');
});
Route::get('/addCategorie', function () {
    return view('layouts/formeAjoutCategorieArticle');
});
Route::get('/addArticleCategorie', function () {
    return view('layouts/formeAjoutArticle');
});
Route::get('/addPrixArticle', function () {
    return view('layouts/formeAddPrixArticle');
});
Route::get('/addPrixArticle',[categoriearticlesController::class,'showCategorie']);

Route::get('/addArticleCategorie',[categoriearticlesController::class,'showCategorieArticle']);

Route::get('/billings',[articleController::class,'showArticle']);

Route::get('/listeCategorie',[articleController::class,'showCategorie']);


Route::get('/accueil',[statController::class,'getNombreProfil']);


Route::get('/home',[statController::class,'getArticle']);


///
Route::get('/getPrice',[referencePrixController::class,'showPrix']);

Route::get('edit_prixArticle/{idReferencePrix}',[referencePrixController::class,'setArticlePrixReference']);

Route::get('/getfournisseurs',[fournisseurController::class,'showFournisseur']);

Route::post('/search_facture',[facturationController::class,'getFacturation']);

Route::get('/search_vente',[commandeController::class,'showCommandePourSortie']);

Route::get('edit_facture/{id}',[facturationController::class,'getFacture']);

Route::get('/pay',[clientController::class,'getClient']);

Route::post('/setPrice',[referencePrixController::class,'modifierPrix']);

Route::get('validate/{codeArticle}',[paiementController::class,'validation']);

Route::get('cancel/{codeArticle}',[paiementController::class,'annulation']);

Route::get('/recu_pay', function () {
    return view('layouts/formeImprimerFacture');
});

Route::get('/recu_pay',[paiementController::class,'showPaiementFacturation']);

Route::get('/encaissement',[paiementController::class,'showEncaissement']);


Route::get('/search_encaissement',[paiementController::class,'showEncaissements']);

Route::get('/etatVente',[commandeController::class,'showEtatVente']);

Route::get('/search_etatVente',[commandeController::class,'showEtatVenteParDate']);


Route::get('/statistiques',[statController::class,'getStatistiques']);

Route::get('/search_statistiques',[statController::class,'getStatistique']);


Route::post('/fournisseur_encaissement',[commandeController::class,'paiementCommande']);

Route::get('/commandesbyarticles',[commandeController::class,'getListeCommandes']);


Route::post('/search_listecommandes',[commandeController::class,'getListeCommandesbyArticles']);


Route::get('/listeCommandeValider',[commandeController::class,'getFullListCommandes']);


Route::post('/search_listescommandes',[commandeController::class,'getFullListCommande']);


Route::get('/benefice',[beneficeController::class,'showBenefice']);


Route::post('/search_benefices',[beneficeController::class,'showBenefices']);


Route::get('/getBenefice',[beneficeController::class,'showBeneficeGlobal']);

Route::get('/showBenefice',[beneficeController::class,'showBeneficeByCommande']);


Route::post('/search_showbenefice',[beneficeController::class,'showBeneficeByCommandes']);

