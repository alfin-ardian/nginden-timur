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
        User::factory(30)->create();

        User::create([
            'name' => 'Rokyah',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'wa' => '081234123412',
            'id_role' => 1,
            'id_dapukan' => 1
        ]);

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
