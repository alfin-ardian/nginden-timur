@extends('admin.layouts.main')

@section('container')
{{-- {{ dd($jadwals) }} --}}
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Dashboard Jadwal Sambung</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Data Pengajian</h6>
            <button type="button" class="btn btn-outline-primary"><a href="/admin/jadwal/create" class="text-decoration-none"><i class="bi bi-person-plus"></i>Tambah Data</a></button>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success col-lg-12 mr-2 mt-3" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Peserta</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->nama_sambung }}</td>
                            <td>{{ $jadwal->tanggal() }}</td>
                            <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai}}</td>
                            <td>{{ $jadwal->tempat}}</td>
                            @if($jadwal->peserta == 'all')
                            <td>Semua Jamaah</td>
                            @elseif($jadwal->peserta == 'ibu')
                            <td>Ibu - Ibu</td>
                            @elseif ($jadwal->peserta == 'pengurus')
                            <td>Pengurus</td>
                            @elseif ($jadwal->peserta == 'remaja')
                            <td>Muda - Mudi</td>
                            @endif
                            <td>
                                <a href="/admin/jadwal/{{ $jadwal->id }}" class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i></a>
                                <a href="/admin/jadwal/{{ $jadwal->id }}/edit" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/admin/jadwal/{{ $jadwal->id }}" method="post" class="d-inline">
                                  @method('delete')
                                  @csrf
                                  <button class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin hapus?')">
                                    <i class="bi bi-trash"></i>
                                  </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
