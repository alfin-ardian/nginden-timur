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
            <form class="row g-3" method="post" action="/admin/user/{{ $user->id }}">
                @method('put')
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }} ">
                  <input type="hidden" class="form-control" name="password" value="{{ old('password',$user->password) }} ">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email',$user->email) }} ">
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">WA</label>
                  <input type="text" class="form-control" name="wa" value="{{ old('wa',$user->wa) }} ">
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir',$user->tempat_lahir) }}">
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                           <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tanggal_lahir" value="{{ old('tanggal_lahir',$user->tanggal_lahir) }}">
                   </div>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Pendidikan</label>
                  <select class="form-control" aria-label="Default select example">
                    <option selected>pilih Pendidikan</option>
                    <option value="L">SD</option>
                    <option value="P">SMP</option>
                    <option value="P">SMA</option>
                    <option value="P">D1</option>
                    <option value="P">D2</option>
                    <option value="P">D3</option>
                    <option value="P">D4</option>
                    <option value="P">S1</option>
                    <option value="P">S2</option>
                    <option value="P">S3</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputPassword4" class="form-label">Status</label>
                  <select class="form-control" name="status">
                    <option selected>pilih Status</option>
                    <option value="H">Hidup</option>
                    <option value="M">Meninggal</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputEmail4" class="form-label">Dapukan</label>
                  <select class="form-control" name="id_role" required>
                    <option value="1">Imam</option>
                    <option value="2">Wakil</option>
                    <option value="3">K.U.</option>
                    <option value="4">Penerobos</option>
                    <option value="5">Mubalight</option>
                    <option value="6">Rokyah</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputPassword4" class="form-label">Status Pernikahan</label>
                  <select class="form-control" aria-label="Default select example">
                    <option selected>pilih status</option>
                    <option value="P">Lajang</option>
                    <option value="L">Menikah</option>
                    <option value="P">Duda</option>
                    <option value="P">Janda</option>
                  </select>
                </div>
                <div class="col-12 mt-3">
                  <label class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" placeholder="silakan isi pekerjaan" name="pekerjaan" value="{{ old('pekerjaan',$user->pekerjaan) }} ">
                </div>
                <div class="col-12 mt-3">
                  <label for="inputAddress" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="alamat" value="{{ old('alamat',$user->alamat) }} ">
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection


