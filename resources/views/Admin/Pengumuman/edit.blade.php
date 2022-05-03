@extends('Admin.Layouts.main')

@section('container')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Pengumuman</h1>

    <!-- DataTales Example -->
    {{-- {{ dd($pengumuman) }} --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-info"><a href="/admin/pengumuman" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/pengumuman/{{ $pengumuman->id }}">
                @method('put')
                @csrf
                <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul')is-invalid @enderror" name="judul" placeholder="silakan isi judul" value="{{ old('judul', $pengumuman->judul) }}">
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3 mt-3">
                <label class="form-label">slug</label>
                <input type="text" class="form-control @error('slug')is-invalid @enderror" name="slug" value="{{ old('slug', $pengumuman->slug) }}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3 mt-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis"  class="form-control @error('penulis')is-invalid @enderror" placeholder="silakan isi penulisnya" value="{{ old('penulis', $pengumuman->penulis) }}">
                @error('penulis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
                <div class="mb-3">
                    @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <input id="isi" type="hidden" name="isi" value="{{ old('isi',$pengumuman->isi) }}">
                    <trix-editor input="isi"></trix-editor>
                </div>
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    const judul = document.querySelector('input[name=judul]');
    const slug = document.querySelector('input[name=slug]');

    judul.addEventListener('change', function(e) {
        slug.value = judul.value.toLowerCase().replace(/ /g, '-');
    });

    document.addEventListener('trix-file-accept', function(event) {
      event.preventDefault();
    });
</script>
@endsection
