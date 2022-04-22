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
                  <label for="inputEmail4" class="form-label">Nama</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Jenis Kelamin</label>
                  <select class="form-control" aria-label="Default select example">
                    <option selected>pilih gender</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputPassword4" class="form-label">WA</label>
                  <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputEmail4" class="form-label">Pendidikan</label>
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
                  <select class="form-control" aria-label="Default select example">
                    <option selected>pilih Status</option>
                    <option value="L">Hidup</option>
                    <option value="P">Meninggal</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputEmail4" class="form-label">Dapukan</label>
                  <select class="form-control" aria-label="Default select example">
                    <option selected>pilih Dapukan</option>
                    <option value="L">Imam</option>
                    <option value="P">Rokyah</option>
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
                  <label for="inputAddress" class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12 mt-3">
                  <label for="inputAddress" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection

