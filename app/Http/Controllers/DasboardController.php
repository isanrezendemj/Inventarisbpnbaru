<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Log;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class DasboardController extends Controller
{


    public function index()
    {
        $log = Log::latest()->get();


        $Inventaris = Inventaris::get()->count();
        $jenis = Jenis::get()->count();
        $pengguna = Pengguna::get()->count();
        return view('home', ['Inventaris' => $Inventaris, 'jenis' => $jenis, 'pengguna' => $pengguna, 'logs' => $log]);
    }
}