@extends('personal.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Pengumuman</h1>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-7">
            <div class="card mb-4">

              <div class="card text-center">
                <div class="card-header">
                  judul pengumuman
                </div>
                <div class="card-body">
                  <p class="card-text">isi pengumuman</p>
                  <p>oleh : Chumike</p>
                </div>
                <div class="card-footer text-muted">
                  {{ $jadwal->created_at->diffForHumans() }}
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Absensi Sambung Kelompok</h5>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="post" action="/personal">
                    {{-- @method('put') --}}
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label">Presensi</label>
                        <select class="form-control" name="presensi" value="{{ old('status') }}" id="selection" onchange="changeplh()">
                          <option selected value="">pilih presensi</option>
                          <option value="H">Hadir</option>
                          <option value="I">Izin</option>
                          <option value="S">Sakit</option>
                        </select>
                      </div>
                      <input type="hidden" class="form-control" name="user_id" value="{{ old('user_id') }}">
                      <input type="hidden" class="form-control" name="jadwal_id" value="{{ old('jadwal_id') }}">
                      <div class="col-md-12 mt-2">
                        <label class="form-label">Keterangan</label>
                        <textarea id="textbox" type="text" default placeholder="contoh Offline" rows="3" class="form-control" name="keterangan" value="{{ old('keterangan') }}"></textarea>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="myModal">Simpan</button>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
function changeplh(){
 var sel = document.getElementById("selection");
    var textbx = document.getElementById("textbox");
    var indexe = sel.selectedIndex;

    if(indexe == 0) {
     $("#textbox").attr("placeholder", "Tulis Keterangan");

    }
    if(indexe == 1) {
     $("#textbox").attr("placeholder", "Contoh : Offline");
    }
    if(indexe == 2) {
     $("#textbox").attr("placeholder", "Contoh : Lembur kerja");
    }
    if(indexe == 3) {
     $("#textbox").attr("placeholder", "Contoh : Pusing");
    }
}
</script>
@endsection
