<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Jurusan;
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
            'jurusan' => Jurusan::count(),
            'chart' => Bobot::all(),
        ]);
    }

    public function index(){

        $jurusan1 = 1;
        $jumlah1 = Jurusan::find($jurusan1);
        $jurusan2 = 2;
        $jumlah2 = Jurusan::find($jurusan2);
        $jurusan3 = 3;
        $jumlah3 = Jurusan::find($jurusan3);
        return view('pengumuman.index',[
            'data1' => Smart::whereHas('Siswa', function ($q) use ($jurusan1) {
                            $q->where('jurusan_id', $jurusan1);
                        })->orderByDesc('hasil')->paginate($jumlah1->beasiswa),
            'jumlah1' => $jumlah1->beasiswa,
            'data2' => Smart::whereHas('Siswa', function ($q) use ($jurusan2) {
                            $q->where('jurusan_id', $jurusan2);
                        })->orderByDesc('hasil')->paginate($jumlah2->beasiswa),
            'jumlah2' => $jumlah2->beasiswa,
            'data3' => Smart::whereHas('Siswa', function ($q) use ($jurusan3) {
                            $q->where('jurusan_id', $jurusan3);
                        })->orderByDesc('hasil')->paginate($jumlah3->beasiswa),
            'jumlah3' => $jumlah3->beasiswa,
        ]);
    }
}
