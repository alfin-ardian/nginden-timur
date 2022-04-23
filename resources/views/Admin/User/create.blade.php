@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary"><a href="/admin/user" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="/admin/user">
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password <a href="#" onclick="return myFunction()">lihat</a></label>
                    <input type="password" id="myInput" class="form-control" name="password" value="{{ old('password') }}">
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">WA</label>
                  <input type="text" class="form-control" name="wa" placeholder="Silakan isi nomor whatsapp" value="{{ old('wa') }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <input placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                      <option selected>pilih gender</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Pendidikan</label>
                  <select class="form-control" name="id_pendidikan" value="{{ old('id_pendidikan') }}">
                    <option selected>pilih Pendidikan</option>
                    <option value="1">SD</option>
                    <option value="2">SMP</option>
                    <option value="3">SMA</option>
                    <option value="4">D1</option>
                    <option value="5">D2</option>
                    <option value="6">D3</option>
                    <option value="7">D4</option>
                    <option value="8">S1</option>
                    <option value="9">S2</option>
                    <option value="10">S3</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="status" value="{{ old('status') }}">
                    <option selected>pilih Status</option>
                    <option value="H">Hidup</option>
                    <option value="M">Meninggal</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputEmail4" class="form-label">Dapukan</label>
                  <select class="form-control" name="id_dapukan" value="{{ old('id_dapukan') }}">
                    <option selected>pilih Dapukan</option>
                    <option value="1">Imam</option>
                    <option value="2">Rokyah</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Status Pernikahan</label>
                  <select class="form-control" name="id_pernikahan" value="{{ old('id_pernikahan') }}">
                    <option value="" selected>pilih status</option>
                    <option value="1">Lajang</option>
                    <option value="2">Menikah</option>
                    <option value="3">Duda</option>
                    <option value="4">Janda</option>
                  </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" placeholder="Tulis disini" name="pekerjaan" value="{{ old('pekerjaan') }}">
                </div>
                <div class="col-12 mt-3">
                  <label for="inputAddress" class="form-label">Alamat</label>
                  <input type="text" class="form-control" placeholder="Tulis disini" name="alamat" value="{{ old('alamat') }}">
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
