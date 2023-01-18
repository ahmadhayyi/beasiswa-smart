<?php

namespace Database\Seeders;

use App\Models\Bobot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min = [1300, 1300, 600, 0];
        $max = [1500, 1500, 800, 4];
        $bobot = [35, 30, 20, 15];
        $kode = ['Pengetahun', 'Keterampilan', 'Muatan Lokal', 'Kondisi Ekonomi'];
        for ($i=0; $i < count($kode); $i++) { 
            Bobot::create([
                'kriteria' => $kode[$i],
                'bobot' => $bobot[$i],
                'min' => $min[$i],
                'max' => $max[$i],
            ]);
        }
    }
}
