<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama_mapel = ['Bhs. Indonesia', 'Bhs. Inggris', 'Matematika'];

        for ($i=0; $i < count($nama_mapel); $i++) {
            Mapel::create([
                'nama_mapel' => $nama_mapel[$i],
            ]);
        }
    }
}
