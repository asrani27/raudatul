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
        <a href="/superadmin/alumni/create" class="btn btn-sm bg-gradient-danger"><i class="fas fa-plus"></i> Tambah
            Alumni</a>
        <br /><br />
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Alumni</h3>
                <div class="card-tools">
                    <form method="get" action="/superadmin/alumni/search">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="search" class="form-control float-right" value="{{old('search')}}"
                                placeholder="Nama">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIM (username)</th>
                            <th>Nama MHS</th>
                            <th>Alamat</th>
                            <th>Tahun Lulus</th>
                            <th>Jurusan</th>
                            <th>Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                            <td>{{$no++}}</td>
                            <td>{{$item->nim}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->tahun_lulus}}</td>
                            <td>{{$item->jurusan == null ? '': $item->jurusan->nama}}</td>
                            <td>{{$item->kontak}}</td>
                            <td>

                                <form action="/superadmin/alumni/{{$item->id}}" method="post">
                                    <a href="/superadmin/alumni/{{$item->id}}/edit" class="btn btn-xs btn-success"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger"
                                        onclick="return confirm('yakin DI Hapus?');"><i class="fas fa-trash"></i>
                                        Delete</button>

                                    @if ($item->user == null)

                                    <a href="/superadmin/alumni/{{$item->id}}/akun" class="btn btn-xs btn-warning"><i
                                            class="fas fa-key"></i> Buat Akun</a>
                                    @else
                                    <a href="/superadmin/alumni/{{$item->id}}/pass" class="btn btn-xs btn-secondary"><i
                                            class="fas fa-key"></i> Reset Pass</a>
                                    @endif
                                </form>

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