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
                <h3 class="card-title">LAPORAN</h3>
                <div class="card-tools">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="/superadmin/laporan/stakeholder" class="btn btn-danger" target="_blank">Lap Stakeholder</a>
                <a href="/superadmin/laporan/alumni" class="btn btn-danger" target="_blank">Lap Data Alumni</a>
                <a href="/superadmin/laporan/kuis" class="btn btn-danger" target="_blank">Lap Hasil Kuesioner</a>
                <br><br />
                <form method="post" action="/superadmin/laporan/stakeholder">
                    @csrf
                    Penilaian Oleh Stakeholder<br />
                    <select name="stakeholder_id" class="form-control" required>
                        <option value="">-pilih-</option>
                        @foreach ($st as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-danger">PRINT</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- {{$data->links()}} --}}
    </div>
</div>

@endsection

@push('js')
@endpush