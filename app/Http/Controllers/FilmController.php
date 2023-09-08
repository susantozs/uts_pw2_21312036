<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Film;
use App\Models\Genre;
use RealRashid\SweetAlert\Fecades\Alert;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::all();
        return view('film.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new film;

        $request->validate([
            'judul'=>'required',
            'ringkasan'=>'required',
            'tahun'=>'required',
            'poster'=>'required',
            'genre'=>'required',
        ]);

        $film ->judul = $request->judul;
        $film ->ringkasan = $request->ringkasan;
        $film ->tahun = $request->tahun;
        $film ->poster = $request->poster;
        $film ->genre_id = $request->genre;

        $film->save();
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $film = Film::where('id',$id)->first();

        return view('film.edit',compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $film = new film;

        $request->validate([
            'judul'=>'required',
            'ringkasan'=>'required',
            'tahun'=>'required',
            'poster'=>'required',
            'genre'=>'required',
        ]);

        $film = film::find($id);
        $film ->judul = $request->judul;
        $film ->ringkasan = $request->ringkasan;
        $film ->tahun = $request->tahun;
        $film ->poster = $request->poster;
        $film ->genre_id = $request->genre;

        $ubah = $film->save();
        if($ubah){
            Alert::success('success', 'Data berhasil diubah');
            return redirect('/film');
        }else{
            Alert::error('failed', 'Data gagal di diubah');
            return redirect('/film');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $film->delete();

        if($ubah){
            Alert::success('success', 'Data berhasil diubah');
            return redirect('/film');
        }else{
            Alert::error('failed', 'Data gagal di diubah');
            return redirect('/film');
        }

        Alert::info('Info', 'Data berhasil');
        return redirect('/film');

    }
}