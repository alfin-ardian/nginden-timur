@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Dashboard Rekap Sambung</h1>
    <div class="card shadow mb-1">
        <div class="card-body">
         <div class="row g-3 align-items-center">
            <div class="col-auto">
              <label for="inputPassword6" class="col-form-label">Bulan</label>
            </div>
            <div class="col-auto">
                <select class="form-control col-auto">
                    <option value="1">Apri 2022</option>
                    <option value="2">Mei 2022</option>
                    <option value="3">Juni 2022</option>
                    <option value="4">Juli 2022</option>
                  </select>
            </div>
          </div>
        </div>
    </div>

    <figure class="highcharts-figure">
    <div id="tableChart"></div>
    {{-- <p class="highcharts-description">
        Chart showing how an HTML table can be used as the data source for the
        chart using the Highcharts data module. The chart is built by
        referencing the existing HTML data table in the page. Several common
        data source types are available, including CSV and Google Spreadsheet.
    </p> --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0" id="datatable">
                <thead>
                    <tr>
                        <th>Nama Sambung</th>
                        <th>Hadir</th>
                        <th>Ijin</th>
                        <th>Sakit</th>
                        <th>Alfa</th>
                        {{-- <th>jumlah</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Kelompok</th>
                        <td>10</td>
                        <td>4</td>
                        <td>2</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Kelompok</th>
                        <td>2</td>
                        <td>0</td>
                        <td>2</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Text</th>
                        <td>5</td>
                        <td>11</td>
                        <td>2</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Kelompok</th>
                        <td>2</td>
                        <td>0</td>
                        <td>2</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Desa</th>
                        <td>2</td>
                        <td>0</td>
                        <td>2</td>
                        <td>10</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </figure>
</div>
@endsection

