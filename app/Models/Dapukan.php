<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dapukan extends Model
{
    use HasFactory;

    protected $guarded = ['id_dapukan'];

    protected $primaryKey = 'id_dapukan';


    // public function user()
    // {
    //     return $this->hasMany(User::class, ['id_user' => 'id']);
    // }
}
