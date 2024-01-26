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
        <!-- End Navbar -->
        @include('header')
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
  <section id="hero">
<div class="container-fluid py-4">
      <div class="row">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xl-12 mb-xl-0 mb-4">
            </div>
            <div class="col-md-12 mb-lg-0 mb-4"> 
            </div>
          </div>
        </div>
      </div>
        <div class="col-3">
        </div>
        <div class="col-12">
          <div class="row">
          <div class="text-center">
            <form role="form" action="/search_categories" method="get">
              <div class="row">
                  <div class="col-6">
                          <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <select name="categorieRechercher" id="" class="form-control">
                                @foreach($listecategories as $categoriesdonne)
                                    <option value="{{ $categoriesdonne->idCategorie }}">{{ $categoriesdonne->libelleCategorie }}</option>
                                @endforeach
                                </select>
                                
                          </div>
                  </div>
                  <div class="col-2">
                        <button type="submit" class="btn btn-lg bg-gradient-success">Rechercher</button>
                  </div>
              </div>
            </form>
              </div>
          </div>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Liste des categories</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Catégorie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Article</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">référence</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantité Max</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantité Min</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prix Unitaire</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $categoriesData)
                    <tr>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                           {{ $categoriesData->libelleCategorie }}
                        </p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                           {{ $categoriesData->libelleArticle }}
                        </p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">
                             {{ $categoriesData->referenceArticle }}
                        </span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                             {{ $categoriesData->quantiteMax }}
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                         {{ $categoriesData->quantiteMin }}
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                         {{ $categoriesData->prixDeVente }}
                        </span>
                      </td>
                     
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                <span>{{ $categories->links() }}</span>
              </div>
            </div> 
          </div>
          <div class="row"> 
                  <div class="col-6">
                         <button type="button" class="btn btn-lg bg-gradient-info"><a href="/liste_categories">Exporter</a></button>
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
