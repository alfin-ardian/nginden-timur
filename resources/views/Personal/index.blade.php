@extends('personal.layouts.main')

@section('container')
<?php
use Illuminate\Support\Carbon;
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Beranda</h1>
    </div>
    <p>Jadwal Hari ini : {{   Carbon::parse(date('Y-m-d H:i:s'))->translatedFormat('l, d F Y')}}</p>
    <div class="row">
        <div class="col-xl-4 col-lg-7">
            <div class="card mb-4">

              <div class="card text-center">
                <div class="card-header">
                  Sambung Kelompok
                </div>
                <div class="card-body">
                  <h5 class="card-title">Masjid Nginden Timur</h5>
                  <p class="card-text">Ust. Dendy : Q.s Al-Baqoroh ayat 1-5</p>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalMd">Absen Sekarang</a>
                  <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalMd">Ubah</a>
                </div>
                <div class="card-footer text-muted">
                  7 menit yang lalu
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Absensi Sambung Kelompok</h5>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Presensi</label>
                        <select class="form-control" name="status" value="{{ old('status') }}">
                          <option selected value="">pilih presensi</option>
                          <option value="H">Hadir</option>
                          <option value="I">Izin</option>
                          <option value="S">Sakit</option>
                        </select>
                      </div>
                      <input type="hidden" class="form-control" name="user_id" value="{{ old('user_id') }}">
                      <input type="hidden" class="form-control" name="jadwal_id" value="{{ old('jadwal_id') }}">
                      <div class="col-md-12 mt-2">
                        <label class="form-label">Keterangan</label>
                        <textarea type="text" placeholder="contoh Offline" rows="3" class="form-control" name="keterangan" value="{{ old('keterangan') }}"></textarea>
                        <textarea type="text" placeholder="contoh Lembur kerja" rows="3" class="form-control" name="keterangan" value="{{ old('keterangan') }}"></textarea>
                        <textarea type="text" placeholder="contoh Pusing" rows="3" class="form-control" name="keterangan" value="{{ old('keterangan') }}"></textarea>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="myModal">Simpan</button>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
