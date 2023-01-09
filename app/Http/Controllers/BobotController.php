<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Http\Requests\StoreBobotRequest;
use App\Http\Requests\UpdateBobotRequest;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.bobot.index',[
            'data' => Bobot::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bobot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBobotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBobotRequest $request)
    {
        Bobot::create($request->all());
        return redirect('/bobot')->with('success', 'Bobot berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function show(Bobot $bobot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bobot $bobot)
    {
        return view('dashboard.bobot.edit',[
            'data' => $bobot,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBobotRequest  $request
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBobotRequest $request, Bobot $bobot)
    {
        Bobot::find($bobot->id)->update($request->all());
        return redirect('/bobot')->with('success', 'Bobot berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bobot $bobot)
    {
        Bobot::destroy($bobot->id);
        return redirect('/bobot')->with('success', 'Bobot berhasil dihapus!');
    }
}
