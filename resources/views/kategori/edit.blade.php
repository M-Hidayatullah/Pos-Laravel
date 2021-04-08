@extends('layouts.template')
@section('content')
<title>Kategori | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/kategori/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="hidden" name="id_kategori" value="{{$kategori->id_kategori}}">
                <input type="text" name="nama_kategori" class="form-control" value="{{$kategori->nama_kategori}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection