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
        <h1 class="h3 mb-0 text-gray-800">Akun Saya</h1>
    </div>
    <p>Data Akun Saya</p>
    <a class="btn btn-info mb-2" href="/personal/user/{{ $user->id }}/edit"><i class="bi bi-pencil-square"></i> Edit</a>
    <a class="btn btn-danger mb-2" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Keluar</a>
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12 mr-2 mt-3" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
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
                    <label class="form-label">{{ ($user->jenis_kelamin == 'L' ? 'Laki-Laki' :( $user->jenis_kelamin == 'P' ? 'Perempuan':'')) }} </label>
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
                    <label class="form-label">Umur</label>
                </div>
                <div class="col">
                    <label class="form-label">:</label>
                    <label class="form-label">{{ $user->age() }} Tahun</label>
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
                    <label class="form-label">Terakhir Login </label>
                    <label class="form-label">{{ $user->last_login() }} </label>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </button>
         </div>
         <div class="modal-body">Klik Keluar jika anda yakin ingin keluar</div>
         <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
             <form action="/logout" method="post">
                 @csrf
                 <button class="btn btn-danger">Keluar <span data-feather="log-out"></span></button>
             </form>
         </div>
     </div>
 </div>
</div>
@endsection
