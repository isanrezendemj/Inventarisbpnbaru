<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;

    protected $table = "mobile";

    protected $fillable = [
        'nama',
        'kode_akses',
        'status',
    ];
}