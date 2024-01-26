<div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h1 class="text-white text-capitalize ps-3" style='text-align:center'>Liste des commandes</h1>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identifiant</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Libellé</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">référence </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">code article</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Libelle Article</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre Articles</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($commandes as $listeCommande)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $listeCommande->id}}</h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                           {{ $listeCommande->libelleCommande }}
                        </p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">
                             {{ $listeCommande->referenceCommande }}
                        </span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                             {{ $listeCommande->codeArticle }}
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                         {{ $listeCommande->libelleArticle }}
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                         {{ $listeCommande->quantite }}
                        </span>
                      </td>
                      <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">
                         {{ $listeCommande->dateCommande }}
                        </span>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                <span></span>
              </div>
            </div> 
          </div>