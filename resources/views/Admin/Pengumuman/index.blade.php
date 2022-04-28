@extends('admin.layouts.main')

<style>
 .btn-outline-primary:hover{
    color: #fff;
    background-color:  #fff;;
    border-color:  #fff;;
 }
</style>
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Dashboard Pengumuman</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Data List Pengumuman</h6>
            <button type="button" class="btn btn-outline-primary"><a href="/admin/pengumuman/create" class="text-decoration-none"><i class="bi bi-person-plus"></i>Tambah</a></button>
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
                            <th>Judul</th>
                            <th>Tanggal Posting</th>
                            <th>Isi Pengumuman</th>
                            <th>Penulis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumumans as $pengumuman)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengumuman->judul }}</td>
                            <td>{{ $pengumuman->tanggal() }}</td>
                            <td>{{ $pengumuman->excerpt }}</td>
                            <td>{{ $pengumuman->penulis}}</td>
                            <td>
                                <a href="/admin/pengumuman/{{ $pengumuman->id }}" class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i></a>
                                <a href="/admin/pengumuman/{{ $pengumuman->id }}/edit" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/admin/pengumuman/{{ $pengumuman->id }}" method="post" class="d-inline">
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
