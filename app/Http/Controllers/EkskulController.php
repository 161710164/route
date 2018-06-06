<?php

namespace App\Http\Controllers;

use App\Ekskul;
use App\Guru;
use App\Fasilitas;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekskuls = Ekskul::with('Guru')->get();
        $ekskuls = Ekskul::with('Fasilitas')->get();
        return view('ekskul.index',compact('ekskuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gurus = Guru::all();
        $fasilitas = Fasilitas::all();
         return view('ekskul.create',compact('gurus','fasilitas'));
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
            'nama_ekskul' => 'required|',
            'guru_id' => 'required|',
            'fasilitas_id' => 'required',
            'jadwal' => 'required'
        ]);
        $ekskuls = new Ekskul;
        $ekskuls->nama_ekskul = $request->nama_ekskul;
        $ekskuls->guru_id = $request->guru_id;
        $ekskuls->fasilitas_id = $request->fasilitas_id;
        $ekskuls->jadwal = $request->jadwal;
        $ekskuls->save();
        return redirect()->route('ekskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ekskuls = Ekskul::findOrFail($id);
        return view('ekskul.show',compact('ekskuls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ekskuls = Ekskul::findOrFail($id);
        $gurus = Guru::all();
        $selectedGuru = Ekskul::findOrFail($id)->guru_id;
        $fasilitas = Fasilitas::all();
        $selectedFasilitas = Ekskul::findOrFail($id)->fasilitas_id;
        return view('ekskul.edit',compact('ekskuls','gurus','selectedGuru','fasilitas','selectedFasilitas')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_ekskul' => 'required|',
            'guru_id' => 'required|',
            'fasilitas_id' => 'required',
            'jadwal' => 'required|'
        ]);
        $ekskuls = Ekskul::findOrFail($id);
        $ekskuls->nama_ekskul = $request->nama_ekskul;
        $ekskuls->guru_id = $request->guru_id;
        $ekskuls->fasilitas_id = $request->fasilitas_id;
        $ekskuls->jadwal = $request->jadwal;
        $ekskuls->save();
        return redirect()->route('ekskul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekskuls = Ekskul::findOrFail($id);
        $ekskuls->delete();
        return redirect()->route('ekskul.index');
    }
}
