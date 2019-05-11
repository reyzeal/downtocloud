@extends('layouts.app')

@section('content')
<div ng-controller="heading" ng-class="show">
  <div class="inner cover">
    <h1 class="cover-heading">perpus.ifupnyk.or.id</h1>
    <p class="lead">Looking for something?</p>
    <div class="form-inline justify-content-center">
      <input class="form-control mr-3">
      <button class="btn btn-secondary my-3">Search</button>
    </div>
    <p class="lead"></p>
    <button class="mt-5 btn btn-primary" ng-click="browse()">Browse</button>
  </div>
</div>

<div id="core" class="container-fluid h-100 position-fixed" ng-controller="core" ng-show="show">
    <div class="row h-100">
        <div class="col-md-3 d-none d-md-block bg-dark h-100 text-white">
          <p>
            Perpustakaan Data IF
          </p>
        </div>
        <div class="col-md-9 bg-white">
          x
        </div>
    </div>
</div>
@endsection
