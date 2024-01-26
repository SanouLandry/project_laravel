
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <!-- <div class="text-center" style="text-align:center"><img src="../assets1/img/LOGO_ISNAKA.png" alt="Chargement en cours" srcset="../assets1/img/LOGO_ISNAKA.png"></div> -->
                <h1 class="text-center" style="text-align:center">ISNAKA</h1>
                <h1 class="text-center" style="text-align:center"></h1>
                <h2 class="text-center" style="text-align:center">Facture d'achat</h2>
                <h3 class="text-center" style="text-align:center">@foreach($montantTotal as $total) {{ $total->nomClient }} {{ $total->prenomClient }} @endforeach</h3>
                <h3 class="text-center" style="text-align:center">@foreach($montantTotal as $total) {{ $total->numeroTelephone}} @endforeach</h3>
              </div>
            </div>
            <div>
              <div>
                <table style="margin: 100px;">
                  <thead style="text-align:center">
                  <tr style="text-align:center">
                      <th style="text-align:center margin: 200px;">Article</th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;">Prix Unitaire</th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;">Quantité</th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;">Prix Total</th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                      <th style="text-align:center margin: 200px;"></th>
                    </tr>
                  </thead>                  
                  <tbody style="text-align:center">
                  @foreach($paie as $listePaiement)
                  <tr style="text-align:center">
                      <td style="text-align:center margin: 200px;">
                        <p style="text-align:center">{{ $listePaiement->libelleArticle }}</p>
                      </td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;">
                        <p style="text-align:center">{{ $listePaiement->prixDeVente }}</p>
                      </td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;">
                        <p style="text-align:center">{{ $listePaiement->quantite }}</p>
                      </td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;">
                        <p style="text-align:center">{{ $listePaiement->prixTotal }}</p>
                      </td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                      <td style="text-align:center margin: 200px;"></td>
                  </tr>  
                  </tbody>
                  <tfoot style="text-align:center margin: 200px;"> 
                  </tfoot>
                  @endforeach
                </table>
                <p  style="text-align:center">
                @foreach($montantTotal as $total)
                      <span style="text-align:center">
                        Montant Total: {{ $total->montantTotal }} FCFA
                      </span>
                @endforeach
                </p>
                <p  style="text-align:center">
                @foreach($montant as $montants)
                      <span style="text-align:center">
                        Montant Encaissé: {{ $montants->montantEncaisse }} FCFA
                      </span>
                @endforeach
                </p>
               <p  style="text-align:center">
               @foreach($montant as $montants)
                      <span style="text-align:center">
                        Monnaie: {{ $montants->monnaie }} FCFA
                      </span>
                @endforeach
                </p>
                <p  style="text-align:right">
                Signature
                <br>
                <br>
                <br>
                <br>
                @foreach($montantTotal as $total)
                      <span style="text-align:right">
                         {{ $total->datePaiement }}
                      </span>
                @endforeach
                </p>
              </div>
            </div> 
          </div>
        </div>
      </div>
</section>  
