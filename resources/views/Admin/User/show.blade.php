@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary"><a href="/admin/user" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" disabled>
                  <input type="hidden" class="form-control" name="password" value="{{ old('password',$user->password) }} ">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Jenis Kelamin</label>
                  <input type="text" class="form-control" name="jenis_kelamin" value="{{ $user->jenis_kelamin == 'L' ? 'Laki-Laki':'Perempuan'}}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">WA</label>
                  <input type="text" class="form-control" name="wa" value="{{ old('wa',$user->wa) }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir',$user->tempat_lahir) }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tanggal Lahir</label>
                  <input type="text" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir',$user->tanggal_lahir) }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Pendidikan</label>
                  <input type="text" class="form-control" name="pendidikan" value="{{ old('pendidikan',$user->pendidikan) }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputPassword4" class="form-label">Status</label>
                  <input type="text" class="form-control" name="status" value="{{ $user->status == 'H' ? 'Hidup' : 'Meninggal' }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputEmail4" class="form-label">Dapukan</label>
                  <input type="text" class="form-control" name="id_dapukan" value="{{ $user->dapukannya ? $user->dapukannya['nama'] : '' }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputPassword4" class="form-label">Status Pernikahan</label>
                  <input type="text" class="form-control" name="status_pernikahan" value="{{ $user->status_pernikahan }}" disabled>
                </div>
                <div class="col-12 mt-3">
                  <label class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan',$user->pekerjaan) }}" disabled>
                </div>
                <div class="col-12 mt-3">
                  <label for="inputAddress" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="inputAddress" name="alamat" value="{{ old('alamat',$user->alamat) }}" disabled>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection


