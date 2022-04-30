<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use App\Models\Jadwal;
use App\Models\Dapukan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Dapukan::create([
            'nama' => 'Rokyah',
            'keterangan' => 'Jamaah yang berada di dapukan ini adalah yang berada di dapukan Rokyah'
        ]);

        Roles::create([
            'name' => 'Admin',
            'keterangan' => 'Super Admin'
        ]);
        Roles::create([
            'name' => 'Penerobos',
            'keterangan' => 'Admin yang bertugas mengelola data jadwal dan dapukan'
        ]);
        Roles::create([
            'name' => 'KU',
            'keterangan' => 'Admin yang bertugas mengelola data jadwal dan dapukan'
        ]);
        Roles::create([
            'name' => 'User',
            'keterangan' => 'User data jamaah'
        ]);
    }
}
