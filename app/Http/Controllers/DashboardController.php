<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\Smart;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view('dashboard.index',[
            'siswa' => Siswa::count(),
            'admin' => User::count(),
            'bobot' => Bobot::count(),
            'setting' => Setting::where('nama', 'jumlah_beasiswa')->get()[0],
            'chart' => Bobot::all(),
        ]);
    }

    public function index(){
        return view('pengumuman.index',[
            'data' => Smart::orderByDesc('hasil')->get(),
            'tampil' => Setting::where('nama', 'jumlah_beasiswa')->get()[0]
        ]);
    }
}
