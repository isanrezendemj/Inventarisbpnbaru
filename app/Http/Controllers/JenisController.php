<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {

        $Jenis = Jenis::latest()->get();
        return view('Jenis', ['jenis' => $Jenis]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "nama_jenis" => "required|unique:jenis",
            "kode_jenis" => "required|unique:jenis",

        ]);

        Jenis::create([
            "nama_jenis" => $request->nama_jenis,
            "kode_jenis" => $request->kode_jenis,


        ]);

        return redirect()->route('jenis');
    }

    public function edit(Jenis $Jenis)
    {
        // dd($inventaris);
        return view('edit_jenis', ['jenis' => $Jenis]);
    }

    public function update(Request $request, Jenis $Jenis)
    {
        // dd($request);
        $this->validate($request, [
            "kode_jenis" => "required",
            "nama_jenis" => "required",
        ]);


        $data = [
            "kode_jenis" => $request->kode_jenis,
            "nama_jenis" => $request->nama_jenis,
        ];

        $Jenis->update($data);

        return redirect('jenis');
    }

    public function destroy(Jenis $Jenis)
    {

        $Jenis->delete();
        return back()->with('success', 'jenis telah di hapus');
    }
}