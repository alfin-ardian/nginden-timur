@extends('Admin.Layouts.main')

@section('container')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Jadwal Sambung</h1>

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
                  <label class="form-label">Nama Sambung : {{ $jadwal->nama_sambung }} </label>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal : {{ $jadwal->tanggal() }}</label>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu : {{ date('H:i',strtotime($jadwal->jam_mulai)) . '-' . date('H:i',strtotime($jadwal->jam_selesai))}}</label>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Waktu Selesai : {{ $jadwal->jam_selesai }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Pertama : {{ $jadwal->pengajar_pertama }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Pertama : {{ $jadwal->materi_pertama }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Kedua : {{ $jadwal->pengajar_kedua }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Kedua : {{ $jadwal->materi_kedua }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Pengajar Ketiga : {{ $jadwal->pengajar_ketiga }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Materi Ketiga : {{ $jadwal->materi_ketiga }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Tempat : {{ $jadwal->tempat }}</label>
                </div>
                <div class="col-6 mt-3">
                    <label for="inputAddress" class="form-label">Link Zoom : {{ $jadwal->link }}</label>
                </div>
                <div class="col-12 mt-3">
                    <label for="inputAddress" class="form-label">Jenis Peserta : {{ $jadwal->peserta }}</label>
                </div>
              </form>
              {{-- <button type="button" class="btn btn-outline-primary"><a href="#" class="text-decoration-none"><i class="fas fa-edit"></i>Absen</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="#" class="text-decoration-none"><i class="fas fa-edit"></i>Hadir Semua</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="#" class="text-decoration-none"><i class="fas fa-edit"></i>Kembali</a></button>
              <button type="button" class="btn btn-outline-primary"><a href="#" class="text-decoration-none"><i class="fas fa-edit"></i>Simpan</a></button>
              <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Presensi</th>
                                <th>Keterangan</th>
                                <th>Waktu Absen</th>
                                <th>Tempat Absen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal->absensi as $absensi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absensi->user['name'] }}</td>
                                <td>
                                    <select class="form-control" name="presensi" value="{{ old('status') }}" id="selection" onchange="changeplh()">
                                        <option selected value="">pilih presensi</option>
                                        <option value="H">Hadir</option>
                                        <option value="I">Izin</option>
                                        <option value="S">Sakit</option>
                                    </select>
                                </td>
                                <td>{{ $absensi->keterangan }}</td>
                                <td>{{ $absensi->waktu_absen ? date('H:i', strtotime($absensi->waktu_absen)) : '' }}  </td>
                                <td>{{ $absensi->tempat_absen }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
        </div>
    </div>

</div>
@endsection
