<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = ['ipa','ips','keagamaan'];
        $jumlah = [2,2,2];

        for ($i=0; $i < count($jurusan); $i++) { 
            Jurusan::create([
                'nama' => $jurusan[$i],
                'beasiswa' => $jumlah[$i],
            ]);
        }
    }
}
