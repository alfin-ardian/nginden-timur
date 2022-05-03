@extends('Personal.Layouts.main')

@section('container')
<style type="text/css">
 .file {
  visibility: hidden;
  position: absolute;
}
</style>
<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Akun Saya</h1>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <a class="btn btn-info mb-2" href="/personal/{{ $user->id }}/edit"><i class="bi bi-pencil-square"></i> Edit</a>
            <div class="row">
                <div class="col">
                    <label class="form-label">Nama</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->name }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Gender</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->jenis_kelamin }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Email</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->email }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Whatsapp</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->wa }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Tempat Lahir</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->tempat_lahir }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Tanggal Lahir</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->tanggal_lahir }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Status</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->status_pernikahan }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Pendidikan</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->pendidikan }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Pekerjaan</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->pekerjaan }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Alamat</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->alamat }} </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Terakhir Login</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->last_login }} </label>
                </div>
            </div>
        </div>
      </div>
    {{-- <h1 class="h3 mb-0 text-gray-800">Akun saya</h1>
    <p>perbarui dan lengkapi informasi akun</p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="row g-3" method="post" action="/admin/user/{{ $user->id }}">
                @method('put')
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Foto Profil</label>
                </div>
                <div class="ml-2 col-sm-6">
                   <div id="msg"></div>
                    <form method="post" id="image-form">
                        <input type="file" name="img[]" class="file" accept="image/*">
                        <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="Pilih Foto" id="file">
                        <div class="input-group-append">
                            <button type="button" class="browse btn btn-primary">Cari...</button>
                        </div>
                        </div>
                    </form>
                </div>
                <div class="ml-2 col-sm-6">
                  <img src="https://placehold.it/20x20" id="preview" class="img-thumbnail">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }} ">
                  <input type="hidden" class="form-control" name="id_role" value="4">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                      @if($user->jenis_kelamin == 'L')
                      <option value="L" selected>Laki-Laki</option>
                      <option value="P">Perempuan</option>
                      @elseif($user->jenis_kelamin == 'P')
                      <option value="L">Laki-Laki</option>
                      <option value="P" selected>Perempuan</option>
                      @else
                      <option value="" selected>pilih gender</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                      @endif
                    </select>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">WA</label>
                    <input type="text" class="form-control" name="wa" value="{{ old('wa',$user->wa) }}" required>
                  </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email',$user->email) }} ">
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir',$user->tempat_lahir) }}">
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                           <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tanggal_lahir" value="{{ old('tanggal_lahir',$user->tanggal_lahir) }}">
                   </div>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Pendidikan</label>
                  <select class="form-control" name="pendidikan">
                    <option selected>pilih pendidikan</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Status Pernikahan</label>
                  <select class="form-control" name="status_pernikahan">
                    <option value="" selected>pilih status pernikahan</option>
                    <option value="lajang">Lajang</option>
                    <option value="menikah">Menikah</option>
                    <option value="duda">Duda</option>
                    <option value="janda">Janda</option>
                  </select>
                </div>
                <div class="col-12 mt-3">
                  <label class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control" placeholder="silakan isi pekerjaan" name="pekerjaan" value="{{ old('pekerjaan',$user->pekerjaan) }} ">
                </div>
                <div class="col-12 mt-3">
                  <label for="inputAddress" class="form-label">Alamat</label>
                  <textarea type="text" class="form-control" id="inputAddress" placeholder="masukan alamat anda" name="alamat" value="{{ old('alamat',$user->alamat) }} "></textarea>
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
              </form>
        </div>
    </div> --}}
</div>
@endsection
