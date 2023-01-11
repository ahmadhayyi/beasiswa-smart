<?php

namespace Database\Seeders;

use App\Models\Nilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $nilai = [[85, 95, 85], [94, 81, 91], [92, 91, 95], [93, 86, 87]];
        for ($i=0; $i < 3; $i++) {
            for ($j=0; $j < 4; $j++) {
                Nilai::create([
                    'siswa_id' => $i+1,
                    'bobot_id' => $j+1,
                    'nilai' => $nilai[$j][$i],
                ]);
            }
        }
    }
}
