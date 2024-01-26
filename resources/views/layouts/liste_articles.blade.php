
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h1 class="text-center" style="text-align:center">Liste des articles</h1>
              </div>
            </div>
            
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary">Categorie</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-uppercase text-secondary">Libellé</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-center text-uppercase text-secondary">référence</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-center text-uppercase text-secondary">Quantité Max</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-uppercase text-secondary ">Quantité Min</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-uppercase text-secondary">Prix Unitaire</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($articles as $articlesData)
                    <tr>
                      <td>
                        <div>
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> -->
                          </div>
                          <div>
                            <p>{{ $articlesData->libelleCategorie }}</p>
                            <p ></p>
                          </div>
                        </div>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <p>
                           {{ $articlesData->libelleArticle }}
                        </p>
                        <p ></p>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <p >
                         {{ $articlesData->referenceArticle }}
                         </p>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <p>
                             {{ $articlesData->quantiteMax }}
                        </p>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                      <p >
                         {{ $articlesData->quantiteMin }}
                        </p>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                      <p>
                         {{ $articlesData->prixDeVente }}
                        </p>
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
