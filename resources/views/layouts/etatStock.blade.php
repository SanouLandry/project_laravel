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
        <form role="form" action="/search_etatArticle" method="get">
              <div class="row">
                  <div class="col-6">
                          <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" name='articleRechercher' value="">
                          </div>
                  </div>
                  <div class="col-2">
                        <button type="submit" class="btn btn-lg bg-gradient-success">Rechercher</button>
                  </div> 
                   
              </div>
            </form>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Etat en stock</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Libellé Article</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code Article</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Réference Article</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total entrée</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Sortie</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock final</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
              @foreach($entreeSortie as $listesorties)
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $listesorties->libelleArticle }}</p>
                    <p class="text-xs text-secondary mb-0"></p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">{{ $listesorties->codeArticle }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $listesorties->referenceArticle }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $listesorties->totalEntree }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $listesorties->totalSortie }}</span>
                  </td>
                  @if($listesorties->nombreArticle < $listesorties->quantiteMin || $listesorties->nombreArticle==$listesorties->quantiteMin)
                  <td class="align-middle text-center">
                    <span class="text-danger text-xs font-weight-bold">{{ $listesorties->nombreArticle }}</span>
                  </td>
                  @endif
                  @if($listesorties->nombreArticle > $listesorties->quantiteMin)
                  <td class="align-middle text-center">
                    <span class="text-success text-xs font-weight-bold">{{ $listesorties->nombreArticle }}</span>
                  </td>
                  @endif
                </tr>
              @endforeach
              </tbody>
                </table>
                {{ $entreeSortie->links() }}
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>