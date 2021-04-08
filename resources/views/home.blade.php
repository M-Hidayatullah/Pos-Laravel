@extends('layouts.template')
@section('content')
<title>Dashboard | Kasir</title>

@if( Session::get('berhasil') !="")
<div class='alert alert-success'><center><b>{{Session::get('berhasil')}}</b></center></div>        
@endif
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Barang</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_barang}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pasok</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_pasok}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-dark shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Transaksi</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_transaksi}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Kasir</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_kasir}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data - data Transaksi</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Jumlah Bayar</th>
                        <th>Kembalian</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->kode_transaksi_kembalian}}</td>
                        <td>{{$u->bayar}}</td>
                        <td>{{$u->kembalian}}</td>
                        <td>{{$u->tanggal_transaksi}}</td>
                        <td><a href="/laporan/{{ $u->kode_transaksi_kembalian}}" class="btn btn-primary btn-sm ml-2">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
