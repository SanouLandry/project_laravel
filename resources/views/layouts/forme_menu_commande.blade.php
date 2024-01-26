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
              <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"><a href="/list_commandes"><h2>Liste des commandes</h2></a></button>
              </div>
            </div>
            <div class="col-xl-12 mb-xl-0 mb-4">
            <div class="text-center">
              <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"><a href="/commandes"><h2>Commander</h2></a></button>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4"> 
            </div>
          </div>
        </div>
      </div>
@endsection