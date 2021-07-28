<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = "pengguna";

    protected $fillable = [
        'nama_pengguna',
        'nip',
        'no_hp',
        'status',
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }
}