<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//class anggota extends Model
class anggota extends Authenticatable
{
    use HasFactory;
    public $table = 'anggota';

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'Password',
        'google_id',
        'otp',
    ];
}
