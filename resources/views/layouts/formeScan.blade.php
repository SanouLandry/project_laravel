

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


<meta charset="utf-8"/>
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


  <body  onload="document.pos.barcode.focus(); ">
    
        
    

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
        <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Ajout  d'un paiement</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg"></i>
                  <small></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3" onload="document.pos.barcode.focus();">
            <form role="form" action=""  method=""  onload="document.pos.barcode.focus();"> 
            {{ csrf_field() }}
                    <label class="form-label">Code barre Article</label> 
                    <div class="input-group input-group-outline mb-3">
                         <input type="number" class="form-control" name='barreCode' value="" required placeholder="Scanner le code barre">
                    </div>
                  </form>   
            </div>
            </div>
        </div>
      </div>
            <div class="card-body pt-4 p-3" onload="document.pos.barcode.focus();">
            <form role="form" action="/scannage"  method="POST"  onload="document.pos.barcode.focus();"> 
            {{ csrf_field() }}
               <label class="form-label">Nom & Prénom(s)</label>
                  <div class="input-group input-group-outline mb-3">
                      <select name="idClient" id="" class="form-control"> 
                        @foreach($clients as $listeClient)
                          <option value="{{ $listeClient->idClient }}">{{ $listeClient->nomClient }} {{ $listeClient->prenomClient }} </option>
                        @endforeach
                      </select>                     
                    </div> 
                    @foreach($price as $prix)
                    
                    <div class="input-group input-group-outline mb-3">
                   
                        <input type="hidden" class="form-control" name='barreCode' value="{{ $prix->codeArticle }}" required placeholder="Scanner le code barre">
                   
                    </div>
                    @endforeach
                    @foreach($price as $prix)
                    <label class="form-label">Prix de  l'article</label> 
                    <div class="input-group input-group-outline mb-3">
                    
                          <input type="text" class="form-control" name='' value="{{ $prix->prixDeVente }}" required placeholder="" readonly>
                     
                    </div>
                    @endforeach
                    <div class="row">
                      <div class="col-lg-6">
                          <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Enregistrer</button>
                          </div> 
                      </div>
                      <div class="col-lg-6">
                          <div class="text-center">
                            <button type="cancel" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Annuler</button>
                        </div> 
                      </div>
                    </div>
                    
                  </form>   
            </div>
          </div>
        </div>
      </div>
          </div>
          
        </div>
        </div>
        <div class="col-2"></div>

      </div>

</boby>
</boby>
</html>



