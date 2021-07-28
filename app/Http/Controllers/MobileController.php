<?php

namespace App\Http\Controllers;

use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function index()
    {

        $Mobile = Mobile::orderBy('status', 'desc')->get();
        return view('mobile', ['mobile' => $Mobile]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "kode_akses" => "required|unique:mobile",
        ]);

        Mobile::create([
            "nama" => $request->nama,
            "kode_akses" => $request->kode_akses,
            "status" => 1,
        ]);

        return redirect()->route('mobile');
    }

    public function toggle(Mobile $mobile)
    {
        $mobile->update([
            'status' => ($mobile->status == 0) ? 1 : 0,
        ]);

        $status =  ($mobile->status == 1) ? 'akses mobile ( ' . $mobile->nama . ' ) diaktifkan' : 'akses mobile ( ' . $mobile->nama . ' ) dinonaktifkan';

        return back()->with('success', $status);
    }
}