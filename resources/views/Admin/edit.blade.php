@extends('Admin.Layouts.main')
@section('container')
<?php
$data = [];

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Absensi Via Admin</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
            <div class="row mt-1 mb-2">
                <div class="container">
                    <form class="d-flex" action="/admin/{{ $jadwal->id }}/edit" method="get">
                        <input class="form-control" type="search" name="search" placeholder="Cari..." aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-info" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="card-body">
            <form class="row g-3" method="post" id="formedit" action="/admin/{{ $jadwal->id }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="jadwal_id" name="jadwal_id" value="{{ $jadwal->id }}">
                @foreach ($jadwal->absensi as $absensi)
                <div class="col-md-3 mb-2">
                  <input type="hidden" class="form-control" name="user_id[]" value="{{ $absensi->user->id }}">
                  <input type="text" class="form-control" value="{{ $absensi->user->name }}" disabled>
                </div>
                <div class="col-md-3 mb-2">
                  <select class="form-control @error('presensi') is-invalid @enderror" name="presensi[]" value="{{ old('presensi',$absensi['presensi']) }}" id="presensi">
                    <option selected value="">pilih presensi</option>
                    <option value="H">Hadir</option>
                    <option value="I">Izin</option>
                    <option value="S">Sakit</option>
                    @if(old('presensi',$absensi['presensi']) == 'H')
                    <option value="H" selected>Hadir</option>
                    <option value="I">Izin</option>
                    <option value="S">Sakit</option>
                    @elseif(old('presensi',$absensi['presensi']) == 'I')
                    <option value="I" selected>Izin</option>
                    <option value="H">Hadir</option>
                    <option value="S">Sakit</option>
                    @elseif(old('presensi',$absensi['presensi']) == 'S')
                    <option value="S" selected>Sakit</option>
                    <option value="H">Hadir</option>
                    <option value="I">Izin</option>
                    @endif
                  </select>
                </div>
                @endforeach
                <div class="col-12 mt-4">
                  <button type="button" class="btn btn-outline-primary"><a href="/admin" class="text-decoration-none"><i class="bi bi-arrow-left"></i>Kembali</a></button>
                  <button type="submit" id="formSubmit" class="btn btn-outline-success">Simpan</button>
                </div>
              </form>
        </div>
    </div>

</div>
<script>
    var jadwals = '{!! json_encode($jadwal->toArray()) !!}';
    var jadwal_json = JSON.parse(jadwals)
    var absensi = [];

    for (var i = 0; i < jadwal_json.absensi.length; i++) {
                absensi.push({
                    id: jadwal_json.absensi[i].id,
                    user_id: jadwal_json.absensi[i].user_id,
                    presensi: jadwal_json.absensi[i].presensi
                });
            }

    $(document).ready(function(){
        $('#formSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: `{{ url('/admin/${jadwal_json->id}') }}`,
                method: 'put',
                data: {
                    absensi: absensi
                },
                success: function(result){
                    if(result.errors)
                    {
                        $('.alert-danger').html('');

                        $.each(result.errors, function(key, value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<li>'+value+'</li>');
                        });
                    }
                    else
                    {
                        $('.alert-danger').hide();
                        $('#exampleModal').modal('hide');
                    }
                }
            });
            alert('Selamat! anda berhasil melakukan presensi');
            location.reload();
        });
    });
</script>
@endsection



