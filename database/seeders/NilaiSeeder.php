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
        for ($i=0; $i < 10; $i++) {
            for ($j=0; $j < 3; $j++) {
                Nilai::create([
                    'siswa_id' => $i+1,
                    'mapel_id' => $j+1,
                    'nilai' => rand(60, 90),
                ]);
            }
        }
    }
}
