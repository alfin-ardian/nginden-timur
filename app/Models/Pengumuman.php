<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'pengumumans';

    public function tanggal()
    {
        return Carbon::parse($this->created_at)->translatedFormat('l, d F Y');
    }
}
