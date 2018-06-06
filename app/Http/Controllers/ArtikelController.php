<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::with('Kategori')->get();
        return view('artikel.index',compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kategoris = Kategori::all();
        return view('artikel.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kategori_id' => 'required|',
            'judul' => 'required|',
            'konten' => 'required',
            'tanggal' => 'required'
        ]);
        $artikels = new Artikel;
        $artikels->kategori_id = $request->kategori_id;
        $artikels->judul = $request->judul;
        $artikels->konten = $request->konten;
        $artikels->tanggal = $request->tanggal;
        $artikels->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikels = Artikel::findOrFail($id);
        return view('artikel.show',compact('artikels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikels = Artikel::findOrFail($id);
        $kategoris = Kategori::all();
        $selectedKategori = Artikel::findOrFail($id)->kategori_id;
        return view('artikel.edit',compact('artikels','kategoris','selectedKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'kategori_id' => 'required|',
            'judul' => 'required|',
            'konten' => 'required',
            'tanggal' => 'required'
        ]);
        $artikels = Artikel::findOrFail($id);
        $artikels->kategori_id = $request->kategori_id;
        $artikels->judul = $request->judul;
        $artikels->konten = $request->konten;
        $artikels->tanggal = $request->tanggal;
        $artikels->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikels = Artikel::findOrFail($id);
        $artikels->delete();
        return redirect()->route('artikel.index');
    }
}
