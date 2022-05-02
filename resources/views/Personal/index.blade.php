@extends('personal.layouts.main')

@section('container')
<?php
use Illuminate\Support\Carbon;
?>
<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Beranda</h1>
    </div>
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
                  @if(isset($jadwal->absensi[0]['waktu_absen']))
                  @if($jadwal->absensi[0]['presensi'] == 'H')
                  <p>Status: <strong>Hadir</strong></p>
                  @elseif($jadwal->absensi[0]['presensi'] == 'I')
                  <p>Status: <strong>Izin</strong></p>
                  @elseif($jadwal->absensi[0]['presensi'] == 'S')
                  <p>Status: <strong>Sakit</strong></p>
                  @endif
                  <p> Waktu Absen : {{ Carbon::parse($jadwal->absensi[0]['waktu_absen'])->format('H:i:s') }}</p> </p>
                  @endif
                  @if(empty($jadwal->absensi[0]['presensi']))
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalMd" id="btnLoading">Absen Sekarang</a>
                  @else
                  <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalMd" id="btnLoading">Ubah</a>
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
                <form class="row g-3" id="formedit" action="/personal">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12">
                        <label class="form-label">Presensi</label>
                        <select class="form-control" name="presensi" value="{{ old('status') }}" id="presensi" onchange="changeplh()" required>
                          <option selected value="">pilih presensi</option>
                          <option value="H">Hadir</option>
                          <option value="I">Izin</option>
                          <option value="S">Sakit</option>
                        </select>
                      </div>
                      @if(isset($jadwal->absensi))
                      <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" class="form-control" id="jadwal_id" name="jadwal_id" value="{{ $jadwal->id }}">
                      <input type="hidden" class="form-control" id="jadwal_id" name="id" value="{{ $jadwal->absensi[0]['id'] }}">
                      @endif
                      <div class="col-md-12 mt-2">
                        <label class="form-label">Keterangan</label>
                        <input id="keterangan" type="text" default placeholder="contoh Offline" rows="3" class="form-control" name="keterangan" value="{{ old('keterangan') }}" required>
                      </div>
                </form>
                <div class="d-flex justify-content-center mt-4" id="btnLoading" hidden>
                    <div class="spinner-border text-info" role="status">
                      <span class="sr-only">Amal sholih tunggu sebentar...</span>
                    </div>
                </div>
                <p class="card-text d-flex justify-content-center mt-2" id="btnLoading">Amal sholih tunggu sebentar...</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" id="submit-edit" class="btn btn-info" onclick="customModalSubmitFunction()">Simpan</button>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#btnLoading').hide();
});
$("#btnLoading").hide();
function changeplh(){
 var sel = document.getElementById("presensi");
    var textbx = document.getElementById("keterangan");
    var indexe = sel.selectedIndex;

    if(indexe == 0) {
     $("#keterangan").attr("placeholder", "Tulis Keterangan");

    }
    if(indexe == 1) {
     $("#keterangan").attr("placeholder", "Contoh : Offline");
    }
    if(indexe == 2) {
     $("#keterangan").attr("placeholder", "Contoh : Lembur kerja");
    }
    if(indexe == 3) {
     $("#keterangan").attr("placeholder", "Contoh : Pusing");
    }
}

function customModalSubmitFunction(){
    $.ajax({
        type: "PUT",
        url: "/personal",
        dataType: 'json',
        data: $('form').serialize(),
        error : function(XMLHttpRequest, textStatus, errorThrown){
            $('#modalMd').modal('hide');
            $('#btnLoading').hide();
            location.reload();
        },
        success: function(html){
            $('#modalMd').modal('hide');
            location.reload();
        },
    });
};
</script>
@endsection
