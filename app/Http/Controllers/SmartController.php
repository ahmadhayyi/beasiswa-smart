<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bobot;
use App\Models\Jurusan;
use App\Models\Nilai;
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
        // $nilai = Nilai::orderBy('siswa_id')->orderBy('bobot_id')->get();
        $jurusan1 = 1;
        $jurusan2 = 2;
        $jurusan3 = 3;
        $nilai1 = Nilai::whereHas('Siswa', function ($q) use ($jurusan1) {
                    $q->where('jurusan_id', $jurusan1);
                })->orderBy('siswa_id')->orderBy('bobot_id')->get();
        $nilai2 = Nilai::whereHas('Siswa', function ($q) use ($jurusan2) {
                    $q->where('jurusan_id', $jurusan2);
                })->orderBy('siswa_id')->orderBy('bobot_id')->get();
        $nilai3 = Nilai::whereHas('Siswa', function ($q) use ($jurusan3) {
                    $q->where('jurusan_id', $jurusan3);
                })->orderBy('siswa_id')->orderBy('bobot_id')->get();

        $jumlah_bobot = Bobot::count();

        // mengatur array data siswa
        $baris1 = 0;
        $baris2 = 0;
        $baris3 = 0;
        for ($s=0; $s < count($nilai1); $s+=$jumlah_bobot) {
            for ($b=0; $b < $jumlah_bobot; $b++) {
                $data1[$baris1][$b] = $nilai1[$s+$b]->nilai;
            }
            $user1[] = $nilai1[$s]->siswa_id;
            $baris1++;
        }
        for ($s=0; $s < count($nilai2); $s+=$jumlah_bobot) {
            for ($b=0; $b < $jumlah_bobot; $b++) {
                $data2[$baris2][$b] = $nilai2[$s+$b]->nilai;
            }
            $user2[] = $nilai2[$s]->siswa_id;
            $baris2++;
        }
        for ($s=0; $s < count($nilai3); $s+=$jumlah_bobot) {
            for ($b=0; $b < $jumlah_bobot; $b++) {
                $data3[$baris3][$b] = $nilai3[$s+$b]->nilai;
            }
            $user3[] = $nilai3[$s]->siswa_id;
            $baris3++;
        }

        // Cari Utility
        $utility1 = cariUtility($bobot, $data1, 'min', 'max');
        $utility2 = cariUtility($bobot, $data2, 'min', 'max');
        $utility3 = cariUtility($bobot, $data3, 'min', 'max');

        // Cari Nilai Akhir
        $nilai_akhir1 = cariNilaiAkhir($utility1, $normalisasi, 'bobot');
        $nilai_akhir2 = cariNilaiAkhir($utility2, $normalisasi, 'bobot');
        $nilai_akhir3 = cariNilaiAkhir($utility3, $normalisasi, 'bobot');

        for ($s=0; $s < count($user1); $s++) {
            Smart::create([
                'siswa_id' => $user1[$s],
                'hasil' => $nilai_akhir1[$s],
            ]);
        }
        for ($s=0; $s < count($user2); $s++) {
            Smart::create([
                'siswa_id' => $user2[$s],
                'hasil' => $nilai_akhir2[$s],
            ]);
        }
        for ($s=0; $s < count($user3); $s++) {
            Smart::create([
                'siswa_id' => $user3[$s],
                'hasil' => $nilai_akhir3[$s],
            ]);
        }

        // return $normalisasi;

        return view('dashboard.smart.index',[
            'data1' => Smart::whereHas('Siswa', function ($q) use ($jurusan1) {
                            $q->where('jurusan_id', $jurusan1);
                        })->orderByDesc('hasil')->paginate(10),
            'nilai1' => Smart::whereHas('Siswa', function ($q) use ($jurusan1) {
                            $q->where('jurusan_id', $jurusan1);
                        })->orderByDesc('hasil'),
            'jumlah1' => Jurusan::find($jurusan1),
            'utility1' => $utility1,
            'data2' => Smart::whereHas('Siswa', function ($q) use ($jurusan2) {
                $q->where('jurusan_id', $jurusan2);
            })->orderByDesc('hasil')->paginate(10),
            'data3' => Smart::whereHas('Siswa', function ($q) use ($jurusan3) {
                $q->where('jurusan_id', $jurusan3);
                        })->orderByDesc('hasil')->paginate(10),

            // Normalisasi
            'normalisasi' => $normalisasi,
            'bobot' => Bobot::all(),
            
        ]);
    }
}
