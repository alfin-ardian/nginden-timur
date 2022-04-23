<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_sambung' => 'Sambung kelompok',
            'tanggal' => '2022-04-23',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '09:00:00',
            'pengajar_pertama' => 'Alfin',
            'pengajar_kedua' => 'Budi',
            'pengajar_ketiga' => 'Caca',
            'materi_pertama' => 'Pemrograman',
            'materi_kedua' => 'Pemrograman',
            'materi_ketiga' => 'Pemrograman',
            'tempat' => 'Lab',
            'link' => 'https://www.google.com',
            'peserta' => '10'
        ];
    }
}
