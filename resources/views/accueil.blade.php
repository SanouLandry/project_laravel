<div class="container">
<h1 style="border:4px outset #3498DB" class="text-center"><a href="/accueil">Alimentation ISNAKA</a></h1>
<h5 class="text-center"><a href="/home">Tableau de bord</a></h5>
</div>
<div class="container-fluid" style="">
	<div class="row">
		@if(session('utilisateurs')->get==1 and session('utilisateurs')->gbda==1 ) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">			
			<h2>Gestion Article</h2>
			<ul>
				<li><div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Ajout d'une categorie article</a></div></li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Ajout d'un article</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Ajout du prix d'un article</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des articles</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Modifier prix article</a></div>
				</li>
			</ul>		
		</div>
		@endif
		@if(session('utilisateurs')->jres==1) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">
			<h2>Journal entrée sortie</h2>
				<li><div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-signal"></span>&nbsp;&nbsp;Journal entrée</a></div></li>
				<li><div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Journal sortie</a></div></li>
		</div>
		@endif
		@if(session('utilisateurs')->gpai==1) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px"> 
			<h2>Gestion Paiements</h2>
			<ul>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Ajout d'un client</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Ajout d'un article à payer par le client</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Valider le paiement</a></div>
				</li>
				<li>
					<div class="row"><a href="index.php?fct=impressions" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Liste des clients</a></div>
				</li>
			</ul>
		</div>
		@endif
	</div>
	<div class="row">
		@if(session('utilisateurs')->gfac==1)
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">
			<h2>Gestion Factures</h2>
			<ul><li>
				<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Réimprimer facture client</a></div>
			</li></ul>
		</div>
		@endif
		@if(session('utilisateurs')->gfour==1)
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">
			<h2>Gestion Fournisseurs</h2>
			<li><div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Ajout d'un fournisseur</a></div></li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Commander chez un fournisseur</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des commandes</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste des fournisseurs</a></div>
				</li>	
		</div>
		@endif
		@if(session('utilisateurs')->jres==1 and session('utilisateurs')->get==1 and session('utilisateurs')->gbda==1 and session('utilisateurs')->gpai==1 and session('utilisateurs')->gfac==1 and session('utilisateurs')->gpaie==1 and session('utilisateurs')->gfour==1) 
		<div class="col-md-4 text-left" style="border:4px inset #3498DB;height:250px;padding-left:50px">
			<h2>Gestion Profil</h2>
			<li><div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Ajouter Profil</a></div></li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Modifier Profil</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Supprimer Profil</a></div>
				</li>
				<li>
					<div class="row"><a href="" class="btn-outline-primary btn-lg btn-block"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Liste de présence</a></div>
				</li>
		</div>
		@endif
	</div>
	
	
</div>
