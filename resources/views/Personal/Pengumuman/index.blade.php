@extends('personal.layouts.main')
@section('container')
<div class="container-fluid mb-4 mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Pengumuman</h1>
    </div>
    @if($pengumumans->count() > 0)
    <div class="row">
        @foreach($pengumumans as $pengumuman)
            <div class="col-xl-3 col-md-3">
                <a href="pengumuman/{{ $pengumuman->id}}" class="text-decoration-none">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $pengumuman->judul }}</h5>
                            <p class="card-text">{{ $pengumuman->excerpt }}</p>
                            <p class="card-text"><small class="text-muted"><i>Oleh : {{ $pengumuman->penulis }} - {{ $pengumuman->created_at->diffForHumans() }}</i></small></p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @else
    <div class="row">
        <div class="col-xl-3 col-md-3">
            <div class="card mb-2">
               <div class="card-body">
                    <p class="card-text">Belum ada pengumuman baru</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
