@extends('Admin.Layouts.main')
@section('container')
<?php
use Illuminate\Support\Carbon;
function findTotal($absensi,$ket){
    $total = 0;
    if($absensi['presensi'] == $ket){
        $total++;
    }
    return $total;
}
$hadir = 0;
$izin = 0;
$sakit = 0;
$belum_absen = 0;
$hadirProsentase = 0;
$izinProsentase = 0;
$sakitProsentase = 0;
$belumAbsenProsentase = 0;
if($user->absensis->count() > 0) {
    foreach($user->absensis as $absensi){
        $hadir += findTotal($absensi,'H');
        $izin += findTotal($absensi,'I');
        $sakit += findTotal($absensi,'S');
        $belum_absen += findTotal($absensi,null);
    }
    $hadirProsentase = ($hadir/$user->absensis->count())*100;
    $izinProsentase = ($izin/$user->absensis->count())*100;
    $sakitProsentase = ($sakit/$user->absensis->count())*100;
    $belumAbsenProsentase = ($belum_absen/$user->absensis->count())*100;
}
?>
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
                  <label class="form-label">Nama</label>
                  <label class="form-label">:</label>
                  <label class="form-label">{{ $user->name }}</label>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Jenis Kelamin</label>
                  <label class="form-label">:</label>
                  <label class="form-label">{{ $user->jenis_kelamin == 'L' ? 'Laki-Laki':'Perempuan'}}</label>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Email</label>
                  <label class="form-label">:</label>
                  <label class="form-label">{{ $user->email }}</label>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">WA</label>
                  <label class="form-label">:</label>
                  <label class="form-label">{{ $user->wa }}</label>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Tempat Lahir</label>
                  <label class="form-label">:</label>
                  <label class="form-label">{{ $user->tempat_lahir }}</label>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Tanggal Lahir</label>
                  <label class="form-label">:</label>
                  <label class="form-label">{{ $user->tanggal_lahir }}</label>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Pendidikan</label>
                  <label class="form-label">:</label>
                  <label class="form-label">{{ $user->pendidikan}}</label>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputPassword4" class="form-label">Status</label>
                  <label for="inputPassword4" class="form-label">:</label>
                  <label for="inputPassword4" class="form-label">{{ $user->status == 'H' ? 'Hidup' : 'Meninggal' }}</label>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputEmail4" class="form-label">Dapukan</label>
                  <label for="inputEmail4" class="form-label">:</label>
                  <label for="inputEmail4" class="form-label">{{ $user->dapukannya ? $user->dapukannya['nama'] : '' }}</label>
                </div>
                <div class="col-md-6 mt-3">
                  <label for="inputPassword4" class="form-label">Status Pernikahan : {{ $user->status_pernikahan }} </label>
                </div>
                <div class="col-6 mt-3">
                  <label class="form-label">Pekerjaan : {{ $user->pekerjaan }}</label>
                </div>
                <div class="col-6 mt-3">
                  <label for="inputAddress" class="form-label">Alamat : {{ $user->alamat }}</label>
                </div>
              </form>
                <h4 class="mt-4">Prosentase Kehadiran</h4>
                <p>rekap per bulan {{ Carbon::parse(date('Y-m'))->translatedFormat('F Y') }}</p>
                <div class="progress mb-2 mt-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $hadirProsentase }}%" aria-valuenow="{{ $hadirProsentase }}" aria-valuemin="0" aria-valuemax="100">{{ $hadirProsentase }}%</div>
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $izinProsentase }}%" aria-valuenow="{{ $izinProsentase }}" aria-valuemin="0" aria-valuemax="100">{{ $izinProsentase }}%</div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $sakitProsentase }}%" aria-valuenow="{{ $sakitProsentase }}" aria-valuemin="0" aria-valuemax="100">{{ $sakitProsentase }}%</div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $belumAbsenProsentase }}%" aria-valuenow="{{ $belumAbsenProsentase }}" aria-valuemin="0" aria-valuemax="100">{{ $belumAbsenProsentase }}%</div>
                </div>
                <br/>
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
        </div>
    </div>

</div>
@endsection


