@extends('personal.layouts.main')
@section('container')
<?php
function findTotal($absensi,$ket){
    $total = 0;
        foreach($absensi as $data){
            if($data->presensi == $ket){
                $total++;
            }
        }
    return $total;
}
$hadir = 0;
$izin = 0;
$sakit = 0;
$belum_absen = 0;
$hadirProsentase = 0;
foreach($jadwals as $jadwal){
$hadirProsentase = (findTotal($jadwal->absensi,'H')/$jadwal->count())*100;
$hadir = findTotal($jadwal->absensi,'H');
$izin = findTotal($jadwal->absensi,'I');
$sakit = findTotal($jadwal->absensi,'S');
$belum_absen = findTotal($jadwal->absensi,null);
}
?>
<div class="container-fluid mb-4 mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Riwayat</h1>
    </div>
    {{-- {{ dd($jadwals) }} --}}
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
    <p>Keimanan anda bulan ini = {{ $hadirProsentase }}%
    <div class="progress mb-2">
       @foreach ($jadwals as $jadwal)
        <div class="progress-bar bg-success" role="progressbar" style="width: {{ (findTotal($jadwal->absensi,'H')/$jadwal->count())*100}}%" aria-valuenow="{{ (findTotal($jadwal->absensi,'H')/$jadwal->count())*100}}" aria-valuemin="0" aria-valuemax="100">{{ (findTotal($jadwal->absensi,'H')/$jadwal->count())*100}}%</div>
        <div class="progress-bar bg-info" role="progressbar" style="width: {{ (findTotal($jadwal->absensi,'I')/$jadwal->count())*100 }}%" aria-valuenow="{{ (findTotal($jadwal->absensi,'I')/$jadwal->count())*100 }}" aria-valuemin="0" aria-valuemax="100">{{ (findTotal($jadwal->absensi,'I')/$jadwal->count())*100 }}%</div>
        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ (findTotal($jadwal->absensi,'S')/$jadwal->count())*100 }}%" aria-valuenow="{{ (findTotal($jadwal->absensi,'S')/$jadwal->count())*100 }}" aria-valuemin="0" aria-valuemax="100">{{ (findTotal($jadwal->absensi,'S')/$jadwal->count())*100 }}%</div>
        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ (findTotal($jadwal->absensi,null)/$jadwal->count())*100 }}%" aria-valuenow="{{ (findTotal($jadwal->absensi,null)/$jadwal->count())*100 }}" aria-valuemin="0" aria-valuemax="100">{{ (findTotal($jadwal->absensi,null)/$jadwal->count())*100 }}%</div>
      @endforeach
    </div>
    <p>Keterangan :</p>
    <div class="text-center small mb-3">
        <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Hadir : {{ $hadir }}
        </span>
        <span class="mr-2">
            <i class="fas fa-circle text-info"></i> Ijin : {{ $izin}}
        </span>
        <span class="mr-2">
            <i class="fas fa-circle text-warning"></i> Sakit : {{ $sakit}}
        </span>
        <span class="mr-2">
            <i class="fas fa-circle text-danger"></i> Belum Absen : {{ $belum_absen}}
        </span>
    </div>
    @if($jadwals->count() > 0)
    <div class="row">
    @foreach($jadwals as $jadwal)
      <div class="col-xl-3 col-md-3">
          <div class="card mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $jadwal->nama_sambung }}</h5>
                <p class="card-text">{{ $jadwal->tanggal() }}</p>
                @foreach ($jadwal->absensi as $absensi)
                @if ($absensi['presensi'] == 'H')
                <p class="card-text">Status : Hadir</p>
                @elseif ($absensi['presensi'] == 'I')
                <p class="card-text">Status : Izin</p>
                @elseif ($absensi['presensi'] == 'S')
                <p class="card-text">Status : Sakit</p>
                @else
                <p class="card-text">Status : Belum Absen</p>
                @endif
                @if($absensi['keterangan'] != null)
                <p class="card-text">Keterangan : {{ $absensi['keterangan'] }}</p>
                @endif
                @if($absensi['waktu_absen'] != null)
                <p class="card-text">Jam Absen : {{ $absensi['waktu_absen'] }}</p>
                @endif
                @endforeach
              </div>
            </div>
          </div>
      </div>
      @endforeach
    </div>
    @endif
</div>

@endsection
