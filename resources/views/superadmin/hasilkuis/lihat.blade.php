@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
ADMIN
@endsection
@section('content')
<br />
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
                        <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Alumni</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="{{$data->nama}}" readonly>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Isi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal"
                            value="{{$data->tanggal == null ? \Carbon\Carbon::now()->format('Y-m-d') : $data->tanggal}}"
                            required>
                    </div>
                </div> --}}
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
                <h3 class="card-title">Hasil Jawaban Kuesioner</h3>
                <div class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @foreach ($kuis as $item)
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pertanyaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="" value="{{$item->pertanyaan}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jawaban</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jawaban[]" value="{{$item->jawaban}}">
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        {{-- {{$data->links()}} --}}
    </div>
</div>


@endsection

@push('js')
@endpush