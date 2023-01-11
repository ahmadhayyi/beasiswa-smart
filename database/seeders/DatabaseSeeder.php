<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

use function PHPUnit\Framework\callback;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(NilaiSeeder::class);
        $this->call(BobotSeeder::class);
        $this->call(SettingSeeder::class);
        // $this->call(SiswaSeeder::class);
        Siswa::factory(10)->create();
    }
}
