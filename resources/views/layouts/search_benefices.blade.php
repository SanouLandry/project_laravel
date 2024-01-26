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
        <div class="col-12">
        <form role="form" action="/search_benefices" method="POST">
            {{ csrf_field() }}
              <div class="row">
                  <div class="col-6">
                          <label class="form-label">Entrer Libellé Commande</label>
                          <div class="input-group input-group-outline mb-3">
                
                             <input type="text" class="form-control" name='commandeRechercher' value="">
                          </div>
                          <button type="submit" class="btn btn-lg bg-gradient-success">Rechercher</button>
                  </div>
                 
                   
              </div>
            </form>
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Etat des bénéfices</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Libellé commande</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Libellé Article</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantité vendue</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Différence de Prix</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bénéfice</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($benefice as $listeBenefices)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $listeBenefices->libelleCommande }}</h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                           {{ $listeBenefices->libelleArticle }}
                        </p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                         {{ $listeBenefices->nombreArticleVendue }}
                        </span>
                      </td>

                      <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold">
                             {{ $listeBenefices->differencePrice }}
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                         {{ $listeBenefices->benefice }}
                        </span>
                      </td>                     
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                <span>{{ $benefice->links() }}</span>
              </div>
            </div> 
          </div>
         
      </div>