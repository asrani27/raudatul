@extends('layouts.app')

@push('css')

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin="" />
<style>
  #mapid {
    height: 380px;
  }
</style>
@endpush
@section('title')
<strong></strong>
@endsection
@section('content')
<br />
<div class="row">
  <div class="col-lg-12">
    <div class="card card-widget">
      <div class="card-body text-center">
        <img src="/theme/logo.png" width="170px"><br />
        <h1><strong>YAYASAN PENDIDIKAN BINA ILMU <br />STMIK INDONESIA BANJARMASIN</strong></h1>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush