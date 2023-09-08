@extends('layout.master')

@section('judul')
    Edit Peran
@endsection

@section('content')
<form method="post" action="/peran/{{$peran->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Film</label>
        <input type="text" name="film" value="{{$peran->film}}" class="form-control" >
    </div>

    @error('film')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Cast</label>
        <input type="text" name="cast" value="{{$peran->cast}}" class="form-control" >
    </div>
    
    @error('cast')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{$peran->nama}}" class="form-control" >
    </div>
    
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection