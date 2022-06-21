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
        <a href="/superadmin/stakeholder/create" class="btn btn-sm bg-gradient-danger"><i class="fas fa-plus"></i>
            Tambah
            stakeholder</a>
        <br /><br />
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data stakeholder</h3>
                <div class="card-tools">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama stakeholder</th>
                            <th>jenis</th>
                            <th>bidang</th>
                            <th>alamat</th>
                            <th>kontak</th>
                            <th>email (username)</th>
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
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->bidang}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->kontak}}</td>
                            <td>{{$item->email}}</td>
                            <td>

                                <form action="/superadmin/stakeholder/{{$item->id}}" method="post">
                                    <a href="/superadmin/stakeholder/{{$item->id}}/edit"
                                        class="btn btn-xs btn-success"><i class="fas fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger"
                                        onclick="return confirm('yakin DI Hapus?');"><i class="fas fa-trash"></i>
                                        Delete</button>

                                    @if ($item->user == null)

                                    <a href="/superadmin/stakeholder/{{$item->id}}/akun"
                                        class="btn btn-xs btn-warning"><i class="fas fa-key"></i> Buat Akun</a>
                                    @else
                                    <a href="/superadmin/stakeholder/{{$item->id}}/pass"
                                        class="btn btn-xs btn-secondary"><i class="fas fa-key"></i> Reset Pass</a>
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
        {{$data->links()}}
    </div>
</div>

@endsection

@push('js')
@endpush