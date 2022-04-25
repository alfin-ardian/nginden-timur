@extends('admin.layouts.main')
@section('container')
<?php
use Illuminate\Support\Carbon;
function findTotal($absensi,$ket){
    $total = 0;
        foreach($absensi as $data){
            if($data->presensi == $ket){
                $total++;
            }
        }
    return $total;
}
?>
<div class="container-fluid">
    {{-- {{ dd($jadwals) }} --}}
    <h1 class="h3 mb-2 text-gray-800">Dashboard Rekap Sambung</h1>
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
    @if($jadwals->count() > 0)

    <figure class="highcharts-figure">
    <div id="tableChart"></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0" id="datatable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Hadir</th>
                        <th>Ijin</th>
                        <th>Sakit</th>
                        <th>Belum Absen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                    <tr>
                        <th>{{ $jadwal->nama_sambung }}</th>
                        <td>{{ findTotal($jadwal->absensi,'H') }}</td>
                        <td>{{ findTotal($jadwal->absensi,'I') }}</td>
                        <td>{{ findTotal($jadwal->absensi,'S') }}</td>
                        <td>{{ findTotal($jadwal->absensi,'') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </figure>
    @else
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="alert alert-primary">
                <h5>Tidak ada data</h5>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

