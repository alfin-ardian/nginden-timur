<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tanggal()
    {
        return Carbon::parse($this->tanggal)->translatedFormat('l, d F Y');
    }
}
