@extends('personal.layouts.main')

@section('container')
<?php
use Illuminate\Support\Carbon;
?>
<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Beranda</h1>
    </div>
    {{-- {{ dd($jadwal) }} --}}
    <p>Jadwal Hari ini : {{   Carbon::parse(date('Y-m-d H:i:s'))->translatedFormat('l, d F Y')}}</p>
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12 mr-2 mt-3" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if(isset($jadwal->absensi))
    <div class="row">
        <div class="col-xl-4 col-lg-7">
            <div class="card mb-4">
              <div class="card text-center">
                <div class="card-header">
                  Kegiatan : {{ $jadwal->nama_sambung }}
                </div>
                <div class="card-body">
                  <h5 class="card-title">Tempat : {{ $jadwal->tempat }}</h5>
                  @if($jadwal->pengajar_pertama)
                  <p class="card-text">{{ $jadwal->pengajar_pertama }} : {{ $jadwal->materi_pertama }}</p>
                  @endif
                  <p> Waktu : {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} </p>
                  @if(isset($jadwal->absensi['waktu_absen']))
                  <p> Status : {{ $jadwal->absensi['presensi'] == 'H' ? 'Hadir': $jadwal->absensi['presensi'] == 'I' ? 'Izin': 'Sakit'}} </p>
                  <p> Waktu Absen : {{ $jadwal->absensi['waktu_absen'] }} </p>
                  @endif
                  @if(empty($jadwal->absensi['presensi']))
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalMd">Absen Sekarang</a>
                  @else
                  <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalMd">Ubah</a>
                  @endif
                </div>
                <div class="card-footer text-muted">
                  {{ $jadwal->created_at->diffForHumans() }}
                </div>
              </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-xl-4 col-lg-7">
            <div class="card mb-4">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title">Belum ada jadwal hari ini</h5>
                </div>
              </div>
            </div>
        </div>
    </div>
    @endif
    @if(empty(Auth::user()->tempat_lahir))
    <div class="row">
        <div class="col-xl-4 col-lg-7">
            <div class="card mb-4">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title">Profil anda belum lengkap, silakan dilengkapi</h5>
                  <a href="/personal/user/{{ Auth::user()->id }}/edit" class="btn btn-info text-decoration-none">Lengkapi Sekarang</a>
                </div>
              </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="modalMd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Absensi Sambung Kelompok</h5>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="post" action="/personal">
                    {{-- @method('put') --}}
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label">Presensi</label>
                        <select class="form-control" name="presensi" value="{{ old('status') }}" id="selection" onchange="changeplh()">
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
                        <textarea id="textbox" type="text" default placeholder="contoh Offline" rows="3" class="form-control" name="keterangan" value="{{ old('keterangan') }}"></textarea>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-info" id="myModal">Simpan</button>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
function changeplh(){
 var sel = document.getElementById("selection");
    var textbx = document.getElementById("textbox");
    var indexe = sel.selectedIndex;

    if(indexe == 0) {
     $("#textbox").attr("placeholder", "Tulis Keterangan");

    }
    if(indexe == 1) {
     $("#textbox").attr("placeholder", "Contoh : Offline");
    }
    if(indexe == 2) {
     $("#textbox").attr("placeholder", "Contoh : Lembur kerja");
    }
    if(indexe == 3) {
     $("#textbox").attr("placeholder", "Contoh : Pusing");
    }
}
</script>
@endsection
