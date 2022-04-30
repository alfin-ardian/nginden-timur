@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard User</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary"><a href="/admin/user" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="/admin/user/{{ $user->id }}">
                @method('put')
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }} ">
                  @error('name')
                  <div class="invalid-feedback">
                      Nama tidak boleh kosong
                  </div>
                  @enderror
                </div>
                @if(Auth::user()->id_role == 1)
                <div class="col-md-6">
                  <label class="form-label">Role</label>
                  <select class="form-control @error('id_role') is-invalid @enderror" name="id_role" required>
                    <option value="" selected>Role</option>
                    @foreach ($role as $data)
                    @if(old('id_role',$user->id_role) == $data->id_role)
                    <option value="{{ $data->id_role }}" selected>{{ $data->name }}</option>
                    @else
                    <option value="{{ $data->id_role }}">{{ $data->name }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                @else
                <input type="hidden" name="id_role" value="4">
                @endif
                <div class="col-md-6 mt-3">
                    <label class="form-label">Password <a href="#" onclick="return myFunction()">lihat</a></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password',$user->password) }}" required>
                    @error('password')
                    <div class="invalid-feedback">
                        Password tidak boleh kosong
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
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir',$user->tempat_lahir) }}">
                  @error('tempat_lahir')
                    <div class="invalid-feedback">
                        Tempat_lahir tidak boleh kosong
                    </div>
                    @enderror
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
                  <label class="form-label">Status</label>
                  <select class="form-control @error('status') is-invalid @enderror" name="status">
                    <option value="" selected>pilih Status</option>
                    <option value="H">Hidup</option>
                    <option value="M">Meninggal</option>
                  </select>
                  @error('status')
                  <div class="invalid-feedback">
                      Status tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-md-6 mt-3">
                  <label class="form-label">Dapukan</label>
                  <select class="form-control @error('id_dapukan') is-invalid @enderror" name="id_dapukan" required>
                    <option value="" selected>pilih dapukan</option>
                    @foreach ($dapukan as $data)
                    @if(old('id_dapukan',$user->id_dapukan) == $data->id_dapukan)
                    <option value="{{ $data->id_dapukan }}" selected>{{ $data->nama }}</option>
                    @else
                    <option value="{{ $data->id_dapukan }}">{{ $data->nama }}</option>
                    @endif
                    @endforeach
                  </select>
                  @error('id_dapukan')
                  <div class="invalid-feedback">
                      Dapukan tidak boleh kosong
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
                <div class="col-6 mt-3">
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
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="inputAddress" placeholder="1234 Main St" name="alamat" value="{{ old('alamat',$user->alamat) }} ">
                  @error('alamat')
                  <div class="invalid-feedback">
                      Alamat tidak boleh kosong
                  </div>
                  @enderror
                </div>
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection
<script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>


