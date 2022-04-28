@extends('personal.layouts.main')
@section('container')
<div class="container-fluid mb-4 mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Detail</h1>
    </div>
    <p>Detail Pengumuman</p>
    <a class="btn btn-outline-info text-decoration-none" href="/personal/pengumuman"><i class="bi bi-arrow-left"></i>Kembali</a>
    <div class="row mt-4">
        <div class="col-xl-3 col-md-3">
            <div class="card">
             <div class="card-body">
                 <h3 class="card-title font-weight-bold">{{ $pengumuman->judul }}</h3>
                 <p class="card-text"><small class="text-muted"><i>Oleh : {{ $pengumuman->penulis }} - {{ $pengumuman->created_at->diffForHumans() }}</i></small></p>
                 <p class="card-text">{{ $pengumuman->excerpt }}</p>
             </div>
            </div>
         </div>
    </div>
</div>

@endsection
