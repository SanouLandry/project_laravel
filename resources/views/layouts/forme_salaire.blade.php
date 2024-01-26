<div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h3 style="text-align:center">ISNAKA</h3>
                <h3 style="text-align:center"></h3>
                @foreach($salaires as $listeSalaire)
                <h1 class="text-white text-capitalize ps-3" style="text-align:center">Bulletin de salaire</h1>
                <h2 style="text-align:center">{{ $listeSalaire->datePaiement }}</h2>
                <br>
                <br>
                <br>
                <h2 style="text-align:center">Nom: {{ $listeSalaire->nom }}</h2>
                <h2 style="text-align:center">Prénom(s): {{ $listeSalaire->prenom }}</h2>

                <h3 style="text-align:center">Salaire de Base: {{ $listeSalaire->salaireBase }} fcfa</h2>
                <h3 style="text-align:center">Indemnités:  {{ $listeSalaire->indemnites }} fcfa</h2>
                <h3 style="text-align:center">Retenues: {{ $listeSalaire->avanceSurSalaire }} fcfa</h2>
                <h3 style="text-align:center">Salaire Perçu: {{ $listeSalaire->salairePercu }} fcfa</h2>
                @endforeach
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0" style="text-align:center">      
                
              </div>
            </div>
          </div>