
 <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary">Libellé</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-uppercase text-secondary">Code Article</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code Barre</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($articles as $listearticles)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <p class="mb-0 text-sm">{{ $listearticles->libelleArticle }}</h6>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                           {{ $listearticles->codeArticle }}
                        </p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="align-middle text-center text-sm">
                        <p class="badge badge-sm bg-gradient-success">
                             {!! $listearticles->codeBarre  !!}
                             {!! $listearticles->codeArticle !!}
                        </p>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>