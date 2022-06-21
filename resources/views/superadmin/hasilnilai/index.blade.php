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
                <h3 class="card-title">HASIL PENILAIAN STAKEHOLDER {{strtoupper($st->nama)}}</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIM</th>
                            <th>Nama MHS</th>
                            <th>I</th>
                            <th>P</th>
                            <th>K</th>
                            <th>KS</th>
                            <th>PD</th>
                            <th>PT</th>
                            <th>BI</th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                            <td>{{$no++}}</td>
                            <td>{{$item->nim}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->integritas}}</td>
                            <td>{{$item->profesionalitas}}</td>
                            <td>{{$item->komunikasi}}</td>
                            <td>{{$item->kerjasama}}</td>
                            <td>{{$item->pengembangan_diri}}</td>
                            <td>{{$item->penguasaan_tik}}</td>
                            <td>{{$item->bahasa_inggris}}</td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- {{$data->links()}} --}}
    </div>
</div>

@endsection

@push('js')
@endpush