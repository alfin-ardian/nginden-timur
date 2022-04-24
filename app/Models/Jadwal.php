<?php

namespace App\Models;

use App\Models\User;
use App\Models\Absensi;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tanggal()
    {
        return Carbon::parse($this->tanggal)->translatedFormat('l, d F Y');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'jadwal_id', 'id');
    }
}
