


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

        <div class="container" >
<h1 style="border:4px outset #3498DB" class="text-center"><a href="/accueil">Alimentation ISNAKA</a></h1>
<h5 class="text-center"><a href="/home">Tableau de bord</a></h5>
</div>
<div class="container-fluid" style=" ">
	<div class="row">
		@if(session('utilisateurs')->get==1 and session('utilisateurs')->gbda==1 ) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:530px;padding-left:50px">			
			<h2>Gestion Article</h2>
			<ul>
				<li><div class="row"><a href="/addCategorie" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Ajout d'une categorie article</a></div></li>
				<li>
					<div class="row"><a href="/addArticleCategorie" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Ajout d'un article</a></div>
				</li>
				<li>
					<div class="row"><a href="/addPrixArticle" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Ajout du prix d'un article</a></div>
				</li>
				<li>
					<div class="row"><a href="/billings" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des articles</a></div>
				</li>
				<li>
					<div class="row"><a href="/getPrice" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Modifier prix article</a></div>
				</li>
				<li>
					<div class="row"><a href="/listeCategorie" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des articles par catégorie</a></div>
				</li>
			</ul>		
		</div>
		@endif
		@if(session('utilisateurs')->jres==1) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:530px;padding-left:50px">
			<h2>Gestion Stock</h2>
			<ul>
				<li><div class="row"><a href="/tables" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-signal"></span>&nbsp;&nbsp;Journal entrée</a></div></li>
				<li><div class="row"><a href="/sorties" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Journal sortie</a></div></li>
				<li><div class="row"><a href="/etatStock" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Etat stock</a></div></li>
				<li><div class="row"><a href="/etatSolde" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Montant encaissé par jour</a></div></li>
				<li><div class="row"><a href="/etatVente" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Etat des ventes</a></div></li>
			</ul>
		</div>
		@endif
		@if(session('utilisateurs')->gpai==1) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:530px;padding-left:10px"> 
			<h2>Gestion Vente</h2>
			<ul>
				<li>
					<div class="row"><a href="/addClient" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Ajout d'un client</a></div>
				</li>
				<li>
					<div class="row"><a href="/addPay" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Ajout d'un article à payer par le client</a></div>
				</li>
				<li>
					<div class="row"><a href="/scan" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Ajout d'un article par scannage</a></div>
				</li>
				<li>
					<div class="row"><a href="/showPay" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Valider/Annuler un paiement</a></div>
				</li>
				<li>
					<div class="row"><a href="/pay" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Liste des clients</a></div>
				</li>
				<li>
					<div class="row"><a href="/encaissement" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Encaissements</a></div>
				</li>
				<li>
					<div class="row"><a href="/statistiques" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Statistiques des ventes par article</a></div>
				</li>

				<li>
					<div class="row"><a href="/benefice" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Bénéfices par articles</a></div>
				</li> 
				<li>
					<div class="row"><a href="/getBenefice" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Bénéfice Global</a></div>
				</li> 
				<li>
					<div class="row"><a href="/showBenefice" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Bénéfice par commande</a></div>
				</li> 
			</ul>
		</div>
		@endif
	</div>
	<div class="row">
		@if(session('utilisateurs')->gfac==1)
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:530px;padding-left:50px">
			<h2>Gestion Factures</h2>
			<ul>
				<li>
					<div class="row"><a href="/recu_pay" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Imprimer facture client</a></div>
				</li>
				<li>
					<div class="row"><a href="/facture" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Réimprimer facture client</a></div>
				</li>
				
		</ul>
		</div>
		@endif
		@if(session('utilisateurs')->gfour==1)
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:530px;padding-left:50px">
			<h2>Gestion Fournisseurs</h2>
			<ul>
			<li><div class="row"><a href="/addFournisseur" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Ajout d'un fournisseur</a></div></li>
				<li>
					<div class="row"><a href="/commandes" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Commander chez un fournisseur</a></div>
				</li>
				<li>
					<div class="row"><a href="/list_commandes" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des commandes non validées</a></div>
				</li>
				<li>
					<div class="row"><a href="/getfournisseurs" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des fournisseurs</a></div>
				</li>
				<li>
					<div class="row"><a href="/commandesbyarticles" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des commandes validées par article</a></div>
				</li>
				<li>
					<div class="row"><a href="/listeCommandeValider" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des commandes validées</a></div>
				</li>			
			</ul>
		</div>
		@endif
		@if(session('utilisateurs')->jres==1 and session('utilisateurs')->get==1 and session('utilisateurs')->gbda==1 and session('utilisateurs')->gpai==1 and session('utilisateurs')->gfac==1 and session('utilisateurs')->gpaie==1 and session('utilisateurs')->gfour==1) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:530px;padding-left:50px">
			<h3>Gestion Profil & Salaire</h3>
			<ul>
			<li><div class="row"><a href="/addProfil" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Ajouter Profil</a></div></li>
				<li>
					<div class="row"><a href="/vr" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Modifier Profil</a></div>
				</li>
				<li>
					<div class="row"><a href="/list_presence" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste de présence</a></div>
				</li>
        			<li>
					<div class="row"><a href="/rtl" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Salaire employée</a></div>
				</li>
			</ul>
		</div>
		@endif
	</div>
	
	
</div>



<!-- End Navbar -->

<!-- Conteneur -->
        

<!-- Footer -->

        
   
        
</div>
       </main>
       @include("settings")     
            















<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" ></script>
<script src="./assets/js/core/bootstrap.min.js" ></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js" ></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>









































































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
