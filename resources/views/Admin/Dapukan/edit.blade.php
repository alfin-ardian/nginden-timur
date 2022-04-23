@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Dapukan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary"><a href="/admin/dapukan" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="/admin/dapukan/{{ $dapukan->id_dapukan }}">
                @method('put')
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Nama Dapukan</label>
                  <input type="text" class="form-control" name="nama" value="{{ old('nama',$dapukan->nama) }} ">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" value="{{ old('keterangan',$dapukan->keterangan) }} ">
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection


