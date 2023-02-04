<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Bobot;
use App\Models\Jurusan;
use App\Models\Nilai;
use App\Models\Smart;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index',[
            'data' => Siswa::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.create',[
            'jurusan' => Jurusan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiswaRequest $request)
    {
        $siswa = Siswa::create($request->all());
        $jumlah_bobot = Bobot::count();
        for ($i=0; $i < $jumlah_bobot; $i++) {
            Nilai::create([
                'siswa_id' => $siswa->id,
                'bobot_id' => $i+1,
            ]);
        }
        return redirect('/siswa')->with('success', 'Siswa berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('dashboard.siswa.edit',[
            'data' => $siswa,
            'jurusan' => Jurusan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiswaRequest  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        Siswa::find($siswa->id)->update($request->all());
        return redirect('/siswa')->with('success', 'Siswa berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);
        Nilai::where('siswa_id', $siswa->id)->delete();
        Smart::where('siswa_id', $siswa->id)->delete();
        return redirect('/siswa')->with('success', 'Siswa berhasil dihapus!');
    }
}
