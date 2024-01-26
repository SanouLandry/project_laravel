@extends('master')


@section('content')

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xl-12 mb-xl-0 mb-4">
            <div class="text-center">
              <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"><a href=""><h2>Liste des fournisseurs</h2></a></button>
              </div>
            </div>
            <div class="col-xl-12 mb-xl-0 mb-4">
            <div class="text-center">
              <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"><a href="/commandes"><h2>Commandes</h2></a></button>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4"> 
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Composition de la commande</h6>
            </div>
            <div class="card-body pt-4 p-3">
              @include('sweetalert::alert')
            <form role="form" action="/add_articles" method="POST">
            {{ csrf_field() }}
                  <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                  
                      <select name="idArticle" id="" class="form-control">
                      @foreach($liste as $listeArticles)
                        <option value="{{ $listeArticles->id }}">{{ $listeArticles->libelleArticle }}</option>
                      @endforeach
                      </select>                     
                    </div>
                  <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre article</label>
                      <input type="text" class="form-control" name='nombreArticle' value="" required>
                    </div>
                   <!--  <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <select name="idArticle" id="" class="form-control">
                           
                                  <option value=""></option>
                              
                      </select>  
                     </div> -->
                  <!--   <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre articles</label>
                      <input type="text" class="form-control" name='quantiteCommande' value="" required>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Enregistrer</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0"> </h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg"></i>
                  <small></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
               <!--  <div class="text-center">
                      <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Composition de la commande</button>
                </div> -->
            </div>
          </div>
        </div>
      </div>
@endsection