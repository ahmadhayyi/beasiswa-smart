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
        Bobot::create([
            'kriteria' => 'kriteria_a',
            'bobot' => 90,
        ]);
        Bobot::create([
            'kriteria' => 'kriteria_b',
            'bobot' => 80,
        ]);
        Bobot::create([
            'kriteria' => 'kriteria_c',
            'bobot' => 70,
        ]);
    }
}
