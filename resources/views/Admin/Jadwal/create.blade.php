@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal Sambung</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary"><a href="/admin/user" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="/admin/jadwal">
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Nama Sambung</label>
                  <input type="text" class="form-control" name="nama_sambung" value="{{ old('nama_sambung') }}" placeholder="Cth. Sambung Kelompok" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <input placeholder="masukkan tanggal" type="date" class="form-control datepicker" name="tanggal" value="{{ old('tanggal') }}" required>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu Mulai</label>
                    <input type="time" class="form-control" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu Selesai</label>
                    <input type="time" class="form-control" name="jam_selesai" value="{{ old('jam_selesai') }}" required>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Pertama</label>
                    <input type="text" class="form-control" placeholder="Ust. ..." name="pengajar_pertama" value="{{ old('pengajar_pertama') }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Pertama</label>
                    <input type="text" class="form-control" placeholder="Cth. Qs. Al-Baqoroh ayat 1-5" name="materi_pertama" value="{{ old('materi_pertama') }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Kedua</label>
                    <input type="text" class="form-control" placeholder="Ust. ..." name="pengajar_kedua" value="{{ old('pengajar_kedua') }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Kedua</label>
                    <input type="text" class="form-control" placeholder="Cth. Hadist Ahkam Hal. 10" name="materi_kedua" value="{{ old('materi_kedua') }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Ketiga</label>
                    <input type="text" class="form-control" placeholder="Ust. ..." name="pengajar_ketiga" value="{{ old('pengajar_ketiga') }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Ketiga</label>
                    <input type="text" class="form-control" placeholder="Cth. Nashehat" name="materi_ketiga" value="{{ old('materi_ketiga') }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Tempat</label>
                    <input type="text" class="form-control" placeholder="Cth. Masjid Nginden Timur" name="tempat" value="{{ old('tempat') }}" required>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Link Zoom</label>
                    <input type="text" class="form-control" placeholder="Tulis disini..." name="link" value="{{ old('link') }}">
                </div>
                <div class="col-12 mt-3">
                    <label for="inputAddress" class="form-label">Jenis Peserta</label>
                    <select class="form-control" name="peserta" value="{{ old('peserta') }}" required>
                        <option value="" selected>pilih jenis peserta</option>
                        <option value="all">Semua Jamaah</option>
                        <option value="ibu">Ibu-Ibu</option>
                        <option value="pengurus">Pengurus</option>
                        <option value="remaja">Muda-Mudi</option>
                    </select>
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection
