@extends('layout.master')

@section('judul')
    Edit Film
@endsection

@section('content')
<form method="post" action="/film/{{$film->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" value="{{$film->judul}}" class="form-control" >
    </div>

    @error('judul')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Ringkasan</label>
        <input type="text" name="ringkasan" value="{{$film->ringkasan}}" class="form-control" >
    </div>
    
    @error('ringkasan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="tahun" value="{{$film->tahun}}" class="form-control" >
    </div>

    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Poster</label>
        <input type="text" name="poster" value="{{$film->poster}}" class="form-control" >
    </div>
    
    @error('poster')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Genre</label>
        <input type="text" name="genre_id" value="{{$film->genre_id}}" class="form-control" >
    </div>
    
    @error('genre_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection