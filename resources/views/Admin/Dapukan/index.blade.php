@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Dapukan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Data Dapukan</h6>
            <button type="button" class="btn btn-outline-primary"><a href="/admin/dapukan/create" class="text-decoration-none"><i class="bi bi-person-plus"></i>Tambah Data</a></button>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success col-lg-12 mr-2 mt-3" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dapukans as $dapukan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dapukan->nama }}</td>
                            <td>{{ $dapukan->keterangan }}</td>
                            <td>
                                <a href="/admin/dapukan/{{ $dapukan->id_dapukan }}" class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i></a>
                                <a href="/admin/dapukan/{{ $dapukan->id_dapukan }}/edit" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/admin/dapukan/{{ $dapukan->id_dapukan }}" method="post" class="d-inline">
                                  @method('delete')
                                  @csrf
                                  <button class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin hapus?')">
                                    <i class="bi bi-trash"></i>
                                  </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
