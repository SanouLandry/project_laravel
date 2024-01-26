
<section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <!-- <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="">
              </div>
            </div> -->
            <div class="col-xl-8col-lg-8 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-8">
              <div class="card card-plain">
                <div class="card-header">
                  <!-- <h4 class="font-weight-bolder">Création du compte</h4> -->
                </div>
                <div class="card-body">
                  <form role="form" action="" method="POST">
                    {{ csrf_field() }}
                    @foreach($profiles as $profilsData)
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="hidden" class="form-control" name="NameProfil" value="{{ $profilsData->idProfil }}">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nom Profil</label>
                      <input type="text" class="form-control" name="NameProfil" value="{{ $profilsData->nomProfil }}">
                    </div>
                    <label class="form-label">Journal entrées et sortie</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="j_entree_sortie" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                     
                    </div>
                    <label class="form-label">Etat des stocks</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="etat_stock" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                     
                    </div>
                    <label class="form-label">Bases de données articles</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="bd_articles" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion de la paie</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_paie" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion des factures</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_factures" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion des paiements</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_paiement" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <label class="form-label">Gestion des fournisseurs</label>
                    <div class="input-group input-group-outline mb-3">
                      <select name="gestion_fournisseurs" id="" class="form-control">
                        <option value="1">oui</option>
                        <option value="0">non</option>
                      </select>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary" style="color: #3498DB;">Enregistrer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
