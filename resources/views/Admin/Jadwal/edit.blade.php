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
                  <input type="text" class="form-control" name="nama_sambung" value="{{ old('nama_sambung',$jadwal->nama_sambung) }}" placeholder="Cth. Sambung Kelompok" required>
                  <input type="hidden" class="form-control" name="id" value="{{ old('id',$jadwal->id) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                      <input placeholder="masukkan tanggal" type="date" class="form-control datepicker" name="tanggal" value="{{ old('tanggal',$jadwal->tanggal) }}" required>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu Mulai</label>
                    <input type="time" class="form-control" name="jam_mulai" value="{{ old('jam_mulai',$jadwal->jam_mulai) }}" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu Selesai</label>
                    <input type="time" class="form-control" name="jam_selesai" value="{{ old('jam_selesai',$jadwal->jam_selesai) }}" required>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Pertama</label>
                    <input type="text" class="form-control" placeholder="Ust. ..." name="pengajar_pertama" value="{{ old('pengajar_pertama',$jadwal->pengajar_pertama) }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Pertama</label>
                    <input type="text" class="form-control" placeholder="Cth. Qs. Al-Baqoroh ayat 1-5" name="materi_pertama" value="{{ old('materi_pertama',$jadwal->materi_pertama) }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Kedua</label>
                    <input type="text" class="form-control" placeholder="Ust. ..." name="pengajar_kedua" value="{{ old('pengajar_kedua',$jadwal->pengajar_kedua) }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Kedua</label>
                    <input type="text" class="form-control" placeholder="Cth. Hadist Ahkam Hal. 10" name="materi_kedua" value="{{ old('materi_kedua',$jadwal->materi_kedua) }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Ketiga</label>
                    <input type="text" class="form-control" placeholder="Ust. ..." name="pengajar_ketiga" value="{{ old('pengajar_ketiga',$jadwal->pengajar_ketiga) }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Ketiga</label>
                    <input type="text" class="form-control" placeholder="Cth. Nashehat" name="materi_ketiga" value="{{ old('materi_ketiga',$jadwal->materi_ketiga) }}">
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Tempat</label>
                    <input type="text" class="form-control" placeholder="Cth. Masjid Nginden Timur" name="tempat" value="{{ old('tempat',$jadwal->tempat) }}" required>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Link Zoom</label>
                    <input type="text" class="form-control" placeholder="Tulis disini..." name="link" value="{{ old('link',$jadwal->link) }}">
                </div>
                <div class="col-12 mt-3">
                    <label for="inputAddress" class="form-label">Jenis Peserta</label>
                    <select class="form-control" name="peserta" value="{{ old('peserta',$jadwal->peserta) }}" required>
                        <option value="" {{ $jadwal->peserta == '' ? 'selected':''}}>pilih jenis peserta</option>
                        <option value="semua-jamaah" {{ $jadwal->peserta == 'semua-jamaah' ? 'selected':''}}>Semua Jamaah</option>
                        <option value="ibu-ibu" {{ $jadwal->peserta == 'ibu-ibu' ? 'selected':''}}>Ibu-Ibu</option>
                        <option value="pengurus" {{ $jadwal->peserta == 'pengurus' ? 'selected':''}}>Pengurus</option>
                        <option value="muda-mudi" {{ $jadwal->peserta == 'muda-mudi' ? 'selected':''}}>Muda-Mudi</option>
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
