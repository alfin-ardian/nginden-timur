@extends('admin.layouts.main')

@section('container')
<?php
use Illuminate\Support\Carbon;
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Laporan</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan
        </a> --}}
    </div>
            <p>Jadwal Hari ini : {{   Carbon::parse(date('Y-m-d H:i:s'))->translatedFormat('l, d F Y')}}</p>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-4 col-lg-7">
            <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Nama :</div>
                           {{ $jadwal->nama_sambung }}
                          </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Pengajar & Materi :</div>
                            {{ $jadwal->pengajar_pertama ? $jadwal->pengajar_pertama . ' : ' . $jadwal->materi_pertama : '' }} <br/>
                            {{ $jadwal->pengajar_kedua ? $jadwal->pengajar_kedua . ' : ' . $jadwal->materi_kedua : '' }} <br/>
                            {{ $jadwal->pengajar_ketiga ? $jadwal->pengajar_ketiga . ' : ' . $jadwal->materi_ketiga : '' }}
                          </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                          <div class="fw-bold">Tempat :</div>
                            {{ $jadwal->tempat }}
                          </div>
                        </li>
                        @if(isset($jadwal->waktu_mulai))
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                          <div class="fw-bold">Waktu :</div>
                            {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}
                          </div>
                        </li>
                        @endif
                        @if(isset($jadwal->link))
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                          <div class="fw-bold">Link :</div>
                            {{ $jadwal->link }}
                          </div>
                        </li>
                        @endif
                      </ol>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-8 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="personalChart"></div>
                    </figure>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Hadir
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Ijin
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Sakit
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Belum Absen
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Presensi Kehadiran</h6>
                </div>
                <div class="card-body">
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
                                    <td>{{ $absensi->presensi }}</td>
                                    <td>{{ $absensi->keterangan }}</td>
                                    <td>{{ $absensi->waktu_absen ? date('H:i', strtotime($absensi->waktu_absen)) : '' }}  </td>
                                    <td>{{ $absensi->tempat_absen }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    var jadwals = '{!! json_encode($jadwal->toArray()) !!}';
</script>
@endsection
