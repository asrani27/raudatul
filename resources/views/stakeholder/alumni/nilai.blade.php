@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
ADMIN
@endsection
@section('content')
<br />
<form method="post" action="/stakeholder/alumni/{{$alumni->id}}/nilai">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Mahasiswa</h3>
                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nim" value="{{$alumni->nim}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Alumni</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{$alumni->nama}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penilai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="penilai"
                                value="{{$data == null ? '': $data->penilai}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Isi</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal"
                                value="{{$data == null ? \Carbon\Carbon::now()->format('Y-m-d') : $data->tgl}}"
                                required>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            {{-- {{$data->links()}} --}}
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">PENILAIAN STAKEHOLDER</h3>
                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Integritas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="integritas"
                                value="{{$data == null ? '': $data->integritas}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Profesionalitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="profesionalitas"
                                value="{{$data == null ? '': $data->profesionalitas}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Komunikasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="komunikasi"
                                value="{{$data == null ? '': $data->komunikasi}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kerja Sama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kerjasama"
                                value="{{$data == null ? '': $data->kerjasama}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pengembangan Diri</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pengembangan_diri"
                                value="{{$data == null ? '': $data->pengembangan_diri}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penguasaan TIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="penguasaan_tik"
                                value="{{$data == null ? '': $data->penguasaan_tik}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bahasa Inggris</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bahasa_inggris"
                                value="{{$data == null ? '': $data->bahasa_inggris}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger btn-block">SIMPAN</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            {{-- {{$data->links()}} --}}
        </div>
    </div>
</form>

@endsection

@push('js')
@endpush