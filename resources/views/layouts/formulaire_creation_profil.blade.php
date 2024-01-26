

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
        <div class="col-md-8 mt-4">
        <div class="card">
        <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <!-- <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="">
              </div>
            </div> -->
            <div class="col-xl-8col-lg-8 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-8">
              <div class="card card-plain">
                <div class="card-header">
                   <h4 class="font-weight-bolder" style="text-align:center">Ajout de profil</h4> 
                </div>
                <div class="card-body">
                  <form role="form" action="/AddProfil" method="POST">
                    {{ csrf_field() }}
                    <label class="form-label">Nom Profil</label>
                    <div class="input-group input-group-outline mb-3">
                     
                      <input type="text" class="form-control" name="NameProfil">
                    </div>
                    <label class="form-label">Journal entrées et sortie</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="j_entree_sortie" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                     
                    </div>
                    <label class="form-label">Etat des stocks</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="etat_stock" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                     
                    </div>
                    <label class="form-label">Bases de données articles</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="bd_articles" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion de la paie</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_paie" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion des factures</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_factures" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion des paiements</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_paiement" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion des fournisseurs</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_fournisseurs" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Enregistrer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          
        </div>
        </div>
        <div class="col-2"></div>

      </div>