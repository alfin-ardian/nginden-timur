@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal Sambung</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary"><a href="/admin/jadwal" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="/admin/jadwal/{{ $jadwal->id }}">
                @method('put')
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Nama Sambung</label>
                  <input type="text" class="form-control" name="nama_sambung" value="{{ old('nama_sambung',$jadwal->nama_sambung) }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <input type="date" class="form-control datepicker" name="tanggal" value="{{ old('tanggal',$jadwal->tanggal) }}" disabled>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu Mulai</label>
                    <input type="time" class="form-control" name="jam_mulai" value="{{ old('jam_mulai',$jadwal->jam_mulai) }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu Selesai</label>
                    <input type="time" class="form-control" name="jam_selesai" value="{{ old('jam_selesai',$jadwal->jam_selesai) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Pertama</label>
                    <input type="text" class="form-control" name="pengajar_pertama" value="{{ old('pengajar_pertama',$jadwal->pengajar_pertama) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Pertama</label>
                    <input type="text" class="form-control" name="materi_pertama" value="{{ old('materi_pertama',$jadwal->materi_pertama) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Kedua</label>
                    <input type="text" class="form-control" name="pengajar_kedua" value="{{ old('pengajar_kedua',$jadwal->pengajar_kedua) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Kedua</label>
                    <input type="text" class="form-control" name="materi_kedua" value="{{ old('materi_kedua',$jadwal->materi_kedua) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Ketiga</label>
                    <input type="text" class="form-control" name="pengajar_ketiga" value="{{ old('pengajar_ketiga',$jadwal->pengajar_ketiga) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Ketiga</label>
                    <input type="text" class="form-control" name="materi_ketiga" value="{{ old('materi_ketiga',$jadwal->materi_ketiga) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Tempat</label>
                    <input type="text" class="form-control" name="tempat" value="{{ old('tempat',$jadwal->tempat) }}" disabled>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Link Zoom</label>
                    <input type="text" class="form-control" name="link" value="{{ old('link',$jadwal->link) }}" disabled>
                </div>
                <div class="col-12 mt-3">
                    <label for="inputAddress" class="form-label">Jenis Peserta</label>
                    <select class="form-control" name="peserta" value="{{ old('peserta',$jadwal->peserta) }}" disabled>
                        <option value="" selected>pilih jenis peserta</option>
                        <option value="1">Semua Jamaah</option>
                        <option value="2">Ibu-Ibu</option>
                        <option value="3">Pengurus</option>
                        <option value="4">Muda-Mudi</option>
                    </select>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection
