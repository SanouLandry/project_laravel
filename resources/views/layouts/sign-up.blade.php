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
       @include('layouts.nav_signup')
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
  <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/home_img2.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <!-- <h4 class="font-weight-bolder">Création du compte</h4> -->
                </div>
                <div class="card-body">
             
                <form role="form" action="/register" method="POST">
                  {{ csrf_field() }}
                  <label class="form-label">Groupe Profil</label>
                  <div class="input-group input-group-outline mb-3">
                      <select name="id" id="" class="form-control">
                      @foreach($profils as $profiles)
                        <option value="{{ $profiles->id }}">{{ $profiles->groupeProfil }}</option>
                      @endforeach
                      </select>
                    </div>
                    <label class="form-label">Nom</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name='nom'>
                    </div>
                    <label class="form-label">Prénom(s)</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name='prenom'>
                    </div>
                    <label class="form-label">Login</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name='login'>
                    </div>
                    <label class="form-label">Mot de passe</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="password" class="form-control" name='password'>
                    </div>
                    <label class="form-label">Confirmer Mot de passe</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="password" class="form-control" name='confirm_password'>
                    </div>
                    <label class="form-label">Numéro Téléphone</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name='numeroTelephone'>
                    </div>
                    <label class="form-label">Email</label>
                    <div class="input-group input-group-outline mb-3">
                      <input type="email" class="form-control" name='email'>
                    </div>
                  <!--   <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-info btn-lg w-75 mt-4 mb-0" style="background-color: #3498DB;">Enregistrer</button>
                    </div>
                  </form>
                 
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Avez vous déjà un compte?
                    <a href="" class="text-info text-gradient font-weight-bold">S'authentier</a>
                  </p>
                </div>
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