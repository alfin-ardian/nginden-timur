<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\Dapukan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id'];

    // protected $with = ['dapukan'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function age()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age;
    }

    public function dapukannya()
    {
        return $this->hasOne(Dapukan::class, 'id_dapukan', 'id_dapukan');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'user_id', 'id');
    }
}
