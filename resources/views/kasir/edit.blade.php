@extends('layouts.template')
@section('content')
<title>Data Kasir | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/kasir/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama Kasir</label>
                <input type="hidden" name="id" value="{{$kasir->id}}">
                <input type="text" name="name" class="form-control" value="{{$kasir->name}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection