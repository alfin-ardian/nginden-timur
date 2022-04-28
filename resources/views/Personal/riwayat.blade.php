@extends('personal.layouts.main')
@section('container')
<div class="container-fluid mb-4 mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Riwayat</h1>
    </div>
    <div class="card shadow mb-1">
        <div class="card-body">
         <div class="row g-3 align-items-center">
            <div class="col-auto">
              <label for="inputPassword6" class="col-form-label">Bulan</label>
            </div>
            <div class="col-auto">
                <select class="form-control col-auto">
                  <option value="1">Apri 2022</option>
                  <option value="2">Mei 2022</option>
                  <option value="3">Juni 2022</option>
                  <option value="4">Juli 2022</option>
                </select>
            </div>
          </div>
        </div>
    </div>
    <p>Keimanan anda bulan ini = 50%
    <div class="progress mb-2">
      <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
      <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
      <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
    </div>
    <p>Keterangan :</p>
    <div class="col-md-12 mb-3">
        <button type="button" class="btn btn-outline-success">Hadir</button>
        <button type="button" class="btn btn-outline-info">Izin</button>
        <button type="button" class="btn btn-outline-warning">Sakit</button>
        <button type="button" class="btn btn-outline-danger">Belum Absen</button>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Sambung Kelompok</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Sambung Desa</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Sambung Teks</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">NamaSambung</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">NamaSambung</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">NamaSambung</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">NamaSambung</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">NamaSambung</h5>
                <p class="card-text">Status : Hadir</p>
                <p class="card-text">Waktu Absen : 20.15</p>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>

@endsection
