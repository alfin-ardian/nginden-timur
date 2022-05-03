@extends('Admin.Layouts.main')

<style>
 .btn-outline-primary:hover{
    color: #fff;
    background-color:  #fff;;
    border-color:  #fff;;
 }
</style>
@section('container')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Detail Pengumuman</h6>
            <button type="button" class="btn btn-outline-primary"><a href="/admin/pengumuman" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <h3>{{ $pengumuman->judul }}</h3>
            <p><i>Oleh : {{ $pengumuman->penulis }} {{ $pengumuman->created_at->diffForHumans() }}</i> </p>
            <p>{!! $pengumuman->isi !!}</p>
        </div>
    </div>

</div>
@endsection
