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
        $min = [80, 81, 91, 81];
        $max = [95, 94, 98, 93];
        $bobot = [80, 60, 40, 20];
        $kode = ['K001', 'K002', 'K003', 'K004'];
        for ($i=0; $i < 4; $i++) { 
            Bobot::create([
                'kriteria' => $kode[$i],
                'bobot' => $bobot[$i],
                'min' => $min[$i],
                'max' => $max[$i],
            ]);
        }
    }
}
