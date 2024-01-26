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
            <div class="col-xl-12 mb-xl-0 mb-4">
            <div class="text-center">
            <form role="form" action="/search_facture" method="post">
            {{ csrf_field() }}
              <div class="row">
                  <div class="col-6">
                          <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <select name="idClient" id="" class="form-control">
                                  @foreach($clients as $Clientliste)
                                    <option value="{{ $Clientliste->idClient }}">{{ $Clientliste->nomClient }} {{ $Clientliste->prenomClient }}</option>
                                  @endforeach
                                </select> 
                          </div>
                  </div>
                  <div class="col-2">
                        <button type="submit" class="btn btn-lg bg-gradient-success">Rechercher</button>
                  </div> 
                  <div class="col-2">
            
                  </div> 
              </div>
            </form>
              </div>
          </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4"> 
            <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Facturation</h6>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de paiement</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                  <form action="" method="post">
                  {{ csrf_field() }}
                  @foreach($paiement as $listePaiement)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                              <input type="hidden" name="idClient" id="" value="{{ $listePaiement->idClient }}"> 
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
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $listePaiement->datePaiement }}</span>
                      </td>
                      <td class="align-middle">
                        <a href="{{ 'edit_facture/'.$listePaiement->idFacturation }}"class="badge badge-sm bg-gradient-warning" data-toggle="tooltip" data-original-title="Edit user">
                          Imprimer
                        </a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $paiement->links() }}
               <!--  <h2 style='text-align:center'>Montant Total:<span></span></h2> -->
                                 
                <!--   </div>
                      <button type="submit" class="btn btn-dark" >Imprimer Facture</button>
                </div> -->
                </form>
              </div>
          
      
              </div>
            
            </div>
          </div>
        </div>
      </div>
     
                     
            </div>
          </div>
        </div>
      </div>
<script>
  function PrintReceiptContent(el)
  {
    var data = '<input type="button" id="printPageButton '+
    'class="printPageButton" style=" display:block '+
    'width:100% border: none; background-color: #008b8b8; color: #fff'+
    'padding: 14px 28px; font-size: 16px; cursor:pointer; text-align:center'+
    'value=" Print Receipt" oncClick="window.print()">';

    data + = document.getElementById(el).innerHTML;
    myReceipt = window.open("","myWin","left=150,top=130, width=400, height=400");
    myReceipt.screnX=0;
    myReceipt.screnY=0;
    myReceipt.document.write(data);
    myReceipt.document.title='Impression Reçu';
    myReceipt.focus();
    setTimeout(() => {
      myReceipt.close();
    }, 8000);
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
