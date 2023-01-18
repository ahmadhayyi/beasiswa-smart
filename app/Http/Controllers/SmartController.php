<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bobot;
use App\Models\Nilai;
use App\Models\Setting;
use App\Models\Smart;

class SmartController extends Controller
{
    public function __invoke(){

        // Reset Tabel
        Smart::truncate();

        // Perhitungan

        // FUNCTION

        function cariTotal($tabel, $column){
            return collect($tabel)->sum($column);
        }

        // Normalisasi
        function cariNormalisasi($total_bobot, $bobot, $column){
            foreach ($bobot as $key => $value) {
                $normalisasi[$key] = $value->$column / $total_bobot;
            }
            return $normalisasi;
        }

        // Nilai Utility
        function cariUtility($bobot, $data, $min, $max){
            for ($i=0; $i < count($bobot); $i++) {
                for ($j=0; $j < count($data); $j++) {
                    if ($bobot[$i]->$max - $bobot[$i]->$min === 0) {
                        $utility[$i][$j] = 0;
                    }else{
                        $utility[$i][$j] = (($data[$j][$i] - $bobot[$i]->$min) / ($bobot[$i]->$max - $bobot[$i]->$min))*1;
                    }
                }
            }
            return $utility;
        }

        // Menghitung Nilai Akhir
        function cariNilaiAkhir($utility, $normalisasi, $column){
            for ($i=0; $i < count($utility[0]); $i++) {
                $sum = 0;
                for ($j=0; $j < count($normalisasi); $j++) {
                    $sum += $utility[$j][$i] * $normalisasi[$j];
                }
                $nilai_akhir[$i] = $sum;
            }
            return $nilai_akhir;
        }

        // Bobot
        $bobot = Bobot::all();

        // Total Semua Bobot
        $total_bobot = cariTotal($bobot, 'bobot');

        // Normalisasi
        $normalisasi = cariNormalisasi($total_bobot, $bobot, 'bobot');

        // Bobot Minimal & Maximal
        foreach ($bobot as $key => $value) {
            $bobot_minimal[$key] = $value->min;
            $bobot_maximal[$key] = $value->max;
        }

        // Ambil data nilai
        $nilai = Nilai::orderBy('siswa_id')->orderBy('bobot_id')->get();

        $jumlah_bobot = Bobot::count();

        // mengatur array data siswa
        $baris = 0;
        for ($s=0; $s < count($nilai); $s+=$jumlah_bobot) {
            for ($b=0; $b < $jumlah_bobot; $b++) {
                $data[$baris][$b] = $nilai[$s+$b]->nilai;
            }
            $user[] = $nilai[$s]->siswa_id;
            $baris++;
        }

        // Cari Utility
        $utility = cariUtility($bobot, $data, 'min', 'max');

        // Cari Nilai Akhir
        $nilai_akhir = cariNilaiAkhir($utility, $normalisasi, 'bobot');

        for ($s=0; $s < count($user); $s++) {
            Smart::create([
                'siswa_id' => $user[$s],
                'hasil' => $nilai_akhir[$s],
            ]);
        }

        return view('dashboard.smart.index',[
            'data' => Smart::orderByDesc('hasil')->paginate(10),
            'tampil' => Setting::where('nama', 'jumlah_beasiswa')->get()[0],
        ]);
    }
}
