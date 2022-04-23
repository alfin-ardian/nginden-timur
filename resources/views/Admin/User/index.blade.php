@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
{{-- {{ dd($users) }} --}}
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Data Jamaah</h6>
            <button type="button" class="btn btn-outline-primary"><a href="/admin/user/create" class="text-decoration-none"><i class="bi bi-person-plus"></i>Tambah Data</a></button>
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
                            <th>Gender</th>
                            <th>Umur</th>
                            <th>Wa</th>
                            <th>Dapukan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->jenis_kelamin == 'L' ? 'Laki-Laki':'Perempuan' }}</td>
                            <td>{{ $user->age() }}</td>
                            <td>{{ $user->wa }}</td>
                            <td>{{ $user->dapukannya ? $user->dapukannya['nama'] :''}}</td>
                            <td>
                                <a href="/admin/user/{{ $user->id }}" class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i></a>
                                <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/admin/user/{{ $user->id }}" method="post" class="d-inline">
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
