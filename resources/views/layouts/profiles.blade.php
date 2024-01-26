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
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>
<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        @include('sidebar')
        <!-- End Navbar -->
        @include('header')
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
  <section id="hero">
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-3">

        </div>
        <div class="col-9">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Profils</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Entrée/Sorties</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Articles</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">G.Paie</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">G.factures</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">G.Paiements</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">G.Fournisseurs</th>
                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($profiles as $profilsData)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $profilsData->groupeProfil }}</h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          @if($profilsData->jres==1)
                            
                              {{ "Oui" }}
                          @else
                              {{  "Non" }}
                          @endif
                        </p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">
                        @if($profilsData->get==1)
                            
                            {{ "Oui" }}
                        @else
                            {{  "Non" }}
                        @endif
                        </span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                        @if($profilsData->gbda==1)
                            
                            {{ "Oui" }}
                        @else
                            {{  "Non" }}
                        @endif
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                        @if($profilsData->gpai==1)
                            
                            {{ "Oui" }}
                        @else
                            {{  "Non" }}
                        @endif
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                        @if($profilsData->gfac==1)
                            
                            {{ "Oui" }}
                        @else
                            {{  "Non" }}
                        @endif
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                        @if($profilsData->gpaie==1)
                            
                            {{ "Oui" }}
                        @else
                            {{  "Non" }}
                        @endif
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                        @if($profilsData->gfour==1)
                            
                            {{ "Oui" }}
                        @else
                            {{  "Non" }}
                        @endif
                        </span>
                      </td>
                      <td class="align-middle">
                        <a href="{{ 'edit_profiles/'.$profilsData->idProfil }}" class=" badge badge-sm bg-gradient-warning" data-toggle="tooltip" data-original-title="Edit user">
                          Modifier
                        </a>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          
          </div>
        </div>
      </div>
</section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>














































<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
  </body>

</html>







































































<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
  </body>

</html>
