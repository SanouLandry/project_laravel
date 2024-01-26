<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!DOCTYPE html>
<html lang="en">
  <head>


<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="../assets1/img/LOGO_ISNAKA.png" rel="icon">


<title>
  ISNAKA
</title>



<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- CSS Files -->



<link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4}}" rel="stylesheet" />

<link id="pagestyle" href="./assets/js/jquery.min.js }}" rel="stylesheet" />
<link id="pagestyle" href="./assets/js/bootstrap.bundle.min.js }}" rel="stylesheet" />
  </head>
  <body class="g-sidenav-show  bg-gray-100">
      <main class="main-content border-radius-lg ">
        <!-- Navbar -->
        @include('header')
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Ajout d'une commande</h6>
            </div>
            <div class="card-body pt-4 p-3">
            <form role="form" action="/add_commandes" method="POST">
            {{ csrf_field() }}
                  <label class="form-label">Nom & Prénom(s) Fournisseur</label>
                  <div class="input-group input-group-outline mb-3">
                      <select name="idFournisseur" id="" class="form-control">
                      @foreach($fournisseur as $listeFournisseurs)
                        <option value="{{ $listeFournisseurs->id }}">{{ $listeFournisseurs->nom}} {{ $listeFournisseurs->prenom}} </option>
                      @endforeach
                      </select>                     
                    </div>
                    <label class="form-label">Libellé Commande</label>
                  <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name='libelleCommande' value="" required>
                    </div>
                    <label class="form-label">Référence Commande</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name='referenceCommande' value="" required>
                    </div>
                    <label class="form-label">Type Commande</label>
                    <div class="input-group input-group-outline mb-3">   
                   <select name="typeCommande" id="" class="form-control">
                   
                        <option value="externe">Externe</option>
                        <option value="interne">Interne</option>
                   </select>                   
                    </div>
                   
                   <!--  <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <select name="idArticle" id="" class="form-control">
                           
                                  <option value=""></option>
                              
                      </select>  
                     </div> -->
                  <!--   <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre articles</label>
                      <input type="text" class="form-control" name='quantiteCommande' value="" required>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-info btn-lg w-75 mt-4 mb-0">Enregistrer</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Ajout d'articles commande</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg"></i>
                  <small></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
            <form role="form" action="/add_articles_commandes" method="POST">
            {{ csrf_field() }}
                    <label class="form-label">Libellé Commande</label>
                    <div class="input-group input-group-outline mb-3">
                      
                      <select name="idCommande" id="" class="form-control">
                      @foreach($commandes as $listeCommandes)
                        <option value="{{ $listeCommandes->id }}">{{ $listeCommandes->libelleCommande }}</option>
                      @endforeach
                      </select> 
                    </div>          
                    <label class="form-label">Libellé Article</label>       
                     <div class="input-group input-group-outline mb-3">
                     
                      <select name="idArticle" id="" class="form-control">
                      @foreach($liste as $listeArticles)
                        <option value="{{ $listeArticles->codeArticle }}">{{ $listeArticles->libelleArticle }}</option>
                      @endforeach
                      </select>                     
                    </div>
                    <label class="form-label">Prix Article</label>
                    <div class="input-group input-group-outline mb-3">
                     
                      <input type="text" class="form-control" name='prixArticle' value="" required>
                    </div>
                    <label class="form-label">Nombre article</label>
                    <div class="input-group input-group-outline mb-3">
                     
                      <input type="text" class="form-control" name='quantite' value="" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-info btn-lg w-75 mt-4 mb-0">Enregistrer</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>