@extends('layout.master')

@section('judul')
    Edit Cast
@endsection

@section('content')
<form method="post" action="/cast/{{$cast->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{$cast->nama}}" class="form-control" >
    </div>

    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" value="{{$cast->umur}}" class="form-control" >
    </div>

    @error('umur')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Bio</label>
        <input type="text" name="bio" value="{{$cast->bio}}" class="form-control" >
    </div>
    
    @error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection