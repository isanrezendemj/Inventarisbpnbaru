<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_aset',
        'no_aset',
        'tgl_aset',
        'nama_aset',
        'asal_perolehan',
        'rupiah_aset',
        'merk_barang',
        'kondisi',
        'image',
        'pengguna_id',
        'jenis_id',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
}