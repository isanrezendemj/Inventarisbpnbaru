<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function index()
    {

        $Pengguna = Pengguna::latest()->get();
        return view('Pengguna', ['pengguna' => $Pengguna]);
    }
    public function store(Request $request)
    {
        // dd($request);
        // dd(public_path('image'));

        $this->validate($request, [
            "nama_pengguna" => "required",
            "nip" => "required|unique:pengguna",
            "no_hp" => "required|unique:pengguna",
            "status" => "required"
        ]);


        Pengguna::create([
            "nama_pengguna" => $request->nama_pengguna,
            "nip" => $request->nip,
            "no_hp" => $request->no_hp,
            "status" => $request->status,

        ]);

        return redirect()->route('pengguna');
    }

    public function edit(Pengguna $Pengguna)
    {
        // dd($inventaris);
        return view('edit_pengguna', ['pengguna' => $Pengguna]);
    }

    public function detail(Pengguna $pengguna)
    {
        $itemPengguna = $pengguna->inventaris()->latest()->get();
        return view('info_detail', ['items' => $itemPengguna, 'pengguna' => $pengguna]);
    }

    public function update(Request $request, Pengguna $Pengguna)
    {
        // dd($request);
        $this->validate($request, [
            "nama_pengguna" => "required",
            "nip" => "required",
            "no_hp" => "required",
            "status" => "required",
        ]);


        $data = [
            "nama_pengguna" => $request->nama_pengguna,
            "nip" => $request->nip,
            "no_hp" => $request->no_hp,
            "status" => $request->status,
        ];

        $Pengguna->update($data);

        return redirect('pengguna');
    }

    public function destroy(Pengguna $Pengguna)
    {
        $nama = $Pengguna->nama_pengguna;
        $Pengguna->delete();
        return back()->with('success', 'Pengguna ( ' . $nama . ') telah dihapus!');
    }
}