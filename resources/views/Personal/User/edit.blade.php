@extends('personal.layouts.main')

@section('container')
<style type="text/css">
 .file {
  visibility: hidden;
  position: absolute;
}
</style>
<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun Saya</h1>
    </div>
    <h1 class="h3 mb-0 text-gray-800">Akun saya</h1>
    <p>perbarui dan lengkapi informasi akun</p>
    <div class="card shadow mb-4">
        {{-- {{ dd($user) }} --}}
        <div class="card-body">
            <form class="row g-3" method="post" action="/personal/user/{{ $user->id }}">
                @method('put')
                @csrf
                {{-- <div class="col-sm-6">
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
                </div> --}}
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }} ">
                  <input type="hidden" class="form-control" name="id_role" value="4">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
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
                    @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        Jenis kelamin tidak boleh kosong
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">WA</label>
                    <input type="text" class="form-control @error('wa') is-invalid @enderror" name="wa" value="{{ old('wa',$user->wa) }}" required>
                    @error('wa')
                    <div class="invalid-feedback">
                        Nomor whatsapp tidak boleh kosong
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }} ">
                  @error('email')
                  <div class="invalid-feedback">
                      Email tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir',$user->tempat_lahir) }}">
                  @error('tempat_lahir')
                  <div class="invalid-feedback">
                      Tempat lahir tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                           <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input placeholder="masukkan tanggal lahir" type="date" class="form-control datepicker" name="tanggal_lahir" value="{{ old('tanggal_lahir',$user->tanggal_lahir) }}">
                   </div>
                   @error('tanggal_lahir')
                   <div class="invalid-feedback">
                       Tanggal lahir tidak boleh kosong
                   </div>
                   @enderror
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Pendidikan</label>
                  <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan">
                    @if($user->pendidikan == 'SD')
                    <option value="SD" selected>SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'SMP')
                    <option value="SD">SD</option>
                    <option value="SMP" selected>SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'SMA')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA" selected>SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'D1')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1" selected>D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'D2')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2" selected>D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'D3')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3" selected>D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'D4')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4" selected>D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'S1')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1" selected>S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'S2')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2" selected>S2</option>
                    <option value="S3">S3</option>
                    @elseif($user->pendidikan == 'S3')
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3" selected>S3</option>
                    @else
                    <option selected value="">pilih pendidikan</option>
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
                    @endif
                  </select>
                  @error('pendidikan')
                  <div class="invalid-feedback">
                      Pendidikan tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Status Pernikahan</label>
                  <select class="form-control @error('status_pernikahan') is-invalid @enderror" name="status_pernikahan">
                    @if($user->status_pernikahan == 'lajang')
                    <option value="lajang" selected>Lajang</option>
                    <option value="menikah">Menikah</option>
                    <option value="duda">Duda</option>
                    <option value="janda">Janda</option>
                    @elseif($user->status_pernikahan == 'menikah')
                    <option value="lajang">Lajang</option>
                    <option value="menikah" selected>Menikah</option>
                    <option value="duda">Duda</option>
                    <option value="janda">Janda</option>
                    @elseif($user->status_pernikahan == 'duda')
                    <option value="lajang">Lajang</option>
                    <option value="menikah">Menikah</option>
                    <option value="duda" selected>Duda</option>
                    <option value="janda">Janda</option>
                    @elseif($user->status_pernikahan == 'janda')
                    <option value="lajang">Lajang</option>
                    <option value="menikah">Menikah</option>
                    <option value="duda">Duda</option>
                    <option value="janda" selected>Janda</option>
                    @else
                    <option value="" selected>pilih status pernikahan</option>
                    <option value="lajang">Lajang</option>
                    <option value="menikah">Menikah</option>
                    <option value="duda">Duda</option>
                    <option value="janda">Janda</option>
                    @endif
                  </select>
                  @error('status_pernikahan')
                  <div class="invalid-feedback">
                      Status pernikahan tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-12 mt-3">
                  <label class="form-label">Pekerjaan</label>
                  <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" placeholder="silakan isi pekerjaan" name="pekerjaan" value="{{ old('pekerjaan',$user->pekerjaan) }} ">
                  @error('pekerjaan')
                  <div class="invalid-feedback">
                     Pekerjaan tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-12 mt-3">
                  <label for="inputAddress" class="form-label">Alamat</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="masukan alamat anda" name="alamat" value="{{ $user->alamat }}">
                  @error('alamat')
                  <div class="invalid-feedback">
                     Alamat tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection
