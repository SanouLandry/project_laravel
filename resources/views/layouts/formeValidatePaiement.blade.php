

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

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-4" >
            <div class="col-md-12 mb-lg-0 mb-4"> 
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-2"></div>
        <div class="col-md-12 mt-4">
        <div class="card">
                <div class="col-md-6">
                  <h6 class="mb-0">Validation de paiement</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg"></i>
                  <small></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
            <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Vente des articles</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">      
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identifiant</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom et Prénom(s) Client</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N° Téléphone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Libellé Article</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix Unitaire</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantité</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix Total</th>
                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <form action="/facturation" method="post">
                  {{ csrf_field() }}
                  @foreach($paiement as $listePaiement)
                    <tr>               
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                              <input type="hidden" name="idClient" id="" value="{{ $listePaiement->idClient }}"> 
                          </div>
                          <div>
                              <input type="hidden" name="datePaiement" id="" value="{{ $listePaiement->datePaiement }}"> 
                          </div> 
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $listePaiement->id }}</h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $listePaiement->nomClient }} {{ $listePaiement->prenomClient }}</p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{ $listePaiement->numeroTelephone}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $listePaiement->libelleArticle }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $listePaiement->prixDeVente }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $listePaiement->quantite }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $listePaiement->prixTotal }}</span>
                      </td>
                      <td>
                        <a href="{{ 'validate/'.$listePaiement->codeArticle }}"class="badge badge-sm bg-gradient-warning" data-toggle="tooltip" data-original-title="Edit user">
                          Valider
                        </a>
                        <a href="{{ 'cancel/'.$listePaiement->codeArticle }}"class="badge badge-sm bg-gradient-danger" data-toggle="tooltip" data-original-title="Edit user" onclick="return confirm('Etes vous sûr de vouloir annuler?');">
                          Annuler
                        </a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                </form>
              </div>
            </div>
           
        </div>
        </div>
      </div>
          </div>
          <div class="col-md-2 mt-4"></div>
          <div class="col-md-8 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Saisie du montant encaissé</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form role="form" action="/encaisser" method="POST">
                  {{ csrf_field() }}
                  @foreach($listepaye as $paye)
                  <label class="form-label"></label>
                
                  <div class="input-group input-group-outline mb-3">
                   
                      <input type="hidden" class="form-control" name='idClient' value="{{ $paye->idClient }}" readonly >
                    
                    </div>
                  @endforeach
                  <label class="form-label">Montant total:</label>
                  <div class="input-group input-group-outline mb-3">
                   
                      <input type="text" class="form-control" name='montantFacture' value="{{ $paie }}" readonly >
                    
                    </div>
                    <label class="form-label">Montant encaissé:</label>
                    <div class="input-group input-group-outline mb-3">
                     
                      <input type="text" class="form-control" name='montantEncaisse' value="">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-info btn-lg w-25 mt-4 mb-0">Enregistrer</button>
                    </div>
                  </form>
            </div>  
        </div>
        </div>
        <div class="col-md-2 mt-4"></div>
        <div class="col-2"></div>

      </div>