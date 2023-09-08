@extends('layout.master')

@section('judul')
    Tambah Peran
@endsection

@section('content')
<form method="post" action="/peran">
    @csrf
    <div class="form-group">
        <label>Film</label>
        <select name="film" class="form-control">
            <option value="">Pilih Film</option>
            @forelse ($film as $key => $item)
            <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
            @empty
            @endforelse
        </select>
    </div>
    
    @error('film')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Cast</label>
        <select name="cast" class="form-control">
            <option value="">Pilih Cast</option>
            @forelse ($cast as $key => $item)
            <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
            @empty
            @endforelse
        </select>
    </div>
    
    @error('cast')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="poster" value="" class="form-control" >
    </div>
    
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection