<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view('dashboard.index',[
            'siswa' => Siswa::count(),
            'admin' => User::count(),
        ]);
    }

    public function index(){
        return view('pengumuman.index',[
            'data' => Siswa::all(),
        ]);
    }
}
