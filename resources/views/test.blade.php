

			<div class="container">



</div>

<div class="container-fluid">

<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">

@if(session('utilisateurs')->get==1 and session('utilisateurs')->gbda==1 ) 
<h2>Gestion Article</h2>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Ajout d'une categorie article</a></div>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Ajout d'un article</a></div>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Ajout du prix d'un article</a></div>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des articles</a></div>

</div>

<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">
@endif

@if(session('utilisateurs')->jres==1) 
<h2>Journal entrée sortie</h2>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-signal"></span>&nbsp;&nbsp;Journal entrée</a></div>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Journal sortie</a></div>

<!-- <div class="row"><a href="index.php?fct=jr" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;Mouvements</a></div> -->

</div>

<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">
@endif

@if(session('utilisateurs')->gpai==1) 
<h2>Gestion Paiements</h2>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Ajout d'un client</a></div>

<div class="row"><a href="index.php?fct=encaissement" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Ajout d'un article à payer par le client</a></div>

<div class="row"><a href="index.php?fct=generer-factures" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Valider le paiement</a></div>

<div class="row"><a href="index.php?fct=impressions" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Liste des clients</a></div>
@endif
</div>

@if(session('utilisateurs')->gfac==1) 
<h2>Gestion Factures</h2>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Réimprimer facture client</a></div>
<!-- <div class="row"><a href="index.php?fct=encaissement" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Ajout d'un article à payer par le client</a></div>

<div class="row"><a href="index.php?fct=generer-factures" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Valider le paiement</a></div>

<div class="row"><a href="index.php?fct=impressions" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Liste des clients</a></div> -->
@endif
</div>
@if(session('utilisateurs')->gfour==1) 
<h2>Gestion Factures</h2>

<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Réimprimer facture client</a></div>
<!-- <div class="row"><a href="index.php?fct=encaissement" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Ajout d'un article à payer par le client</a></div>

<div class="row"><a href="index.php?fct=generer-factures" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Valider le paiement</a></div>

<div class="row"><a href="index.php?fct=impressions" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Liste des clients</a></div> -->
@endif
</div>

</div>



</div>

</div>