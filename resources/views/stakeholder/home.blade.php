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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Stakeholder</h3>
                <div class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="{{$data->nama}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JENIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jenis" value="{{$data->jenis}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">BIDANG</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bidang" value="{{$data->bidang}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ALAMAT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">KONTAK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kontak" value="{{$data->kontak}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">EMAIL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{$data->email}}" readonly>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- {{$data->links()}} --}}
    </div>
</div>
@endsection

@push('js')

@endpush