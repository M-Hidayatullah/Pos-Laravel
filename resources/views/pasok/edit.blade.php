@extends('layouts.template')
@section('content')
<title>Pasok | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/pasok/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="hidden" name="id_pasok" value={{$pasok->id_pasok}}>
                <input type="hidden" name="id_barang" class="form-control"  value="{{$pasok->barang_pasok_id}}" required>
                <input type="text" name="nama_barang" readonly class="form-control"  value="{{$pasok->nama_barang}}" required>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="text" name="jumlah" class="form-control"  value="{{$pasok->jumlah_pasok}}"  required>
            </div>
            <div class="form-group">
                <label for="">Nama Pemasok</label>
                <input type="text" name="nama_pemasok" class="form-control"  value="{{$pasok->nama_pemasok}}"  required>
            </div>
            <div class="form-group">
                <label for="">Waktu Pasok</label>
                <input type="text" name="tanggal_pasok" class="form-control"  value="{{$pasok->tanggal_pasok}}"  required>
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection