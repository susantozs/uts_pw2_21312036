<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Peran;
use RealRashid\SweetAlert\Fecades\Alert;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peran = Peran::all();
        return view('peran.index', compact('peran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $film = Film::all();
        return view('film.create', compact('film'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peran = new peran;

        $request->validate([
            'film'=>'required',
            'cast'=>'required',
            'nama'=>'required',
        ]);

        $peran ->film_id = $request->film;
        $peran ->cast_id = $request->cast;
        $peran ->nama = $request->nama;

        $peran->save();
        return redirect('/peran');
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
        $peran = Peran::where('id',$id)->first();

        return view('peran.edit',compact('peran'));
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
        $peran = new peran;

        $request->validate([
            'film'=>'required',
            'cast'=>'required',
            'nama'=>'required',
        ]);

        $peran = peran::find($id);
        $peran ->film_id = $request->film;
        $peran ->cast_id = $request->cast;
        $peran ->nama = $request->nama;

        $ubah = $peran->save();
        if($ubah){
            Alert::success('success', 'Data berhasil diubah');
            return redirect('/peran');
        }else{
            Alert::error('failed', 'Data gagal di diubah');
            return redirect('/peran');
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
        $peran = Peran::find($id);
        $peran->delete();

        if($ubah){
            Alert::success('success', 'Data berhasil diubah');
            return redirect('/peran');
        }else{
            Alert::error('failed', 'Data gagal di diubah');
            return redirect('/peran');
        }

        Alert::info('Info', 'Data berhasil');
        return redirect('/peran');

    }
}