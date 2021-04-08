@extends('layouts.template')
@section('content')
<title>Barang | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/barang/update" method="post">
            @csrf
           <div class="form-group">
                <label for="">Kode Barang</label>
                <input type="hidden" name="id_barang2" class="form-control" value="{{$barang->id_barang}}" required>
                <input type="text" name="id_barang" class="form-control" value="{{$barang->id_barang}}" required>
            </div>
            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control"  value="{{$barang->nama_barang}}" required>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="kategori_id" id="" class="form-control">
                        <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($kategori as $k)
                    @if ($barang->kategori_id == $k->id_kategori)
                        <option value="{{$k->id_kategori}}" selected>{{$k->nama_kategori}}</option>
                    @else
                        <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="text" name="jumlah_barang" class="form-control"  value="{{$barang->jumlah_barang}}"  required>
            </div>
            <div class="form-group">
                <label for="">Harga Satuan</label>
                <input type="text" name="harga_barang" class="form-control"  value="{{$barang->harga_barang}}"  required>
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection