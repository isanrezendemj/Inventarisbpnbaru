<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InventarisController extends Controller
{
    public function index()
    {

        $Inventaris = Inventaris::latest()->get();
        $jenis = Jenis::latest()->get();
        $pengguna = Pengguna::latest()->get();
        return view('inventaris', ['inventaris' => $Inventaris, 'jenis' => $jenis, 'pengguna' => $pengguna]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_barang" => "required",
            "jenis_aset" => "required",
            "pengguna_aset" => "required",
            "tgl_aset" => "required",
            "asal_perolehan" => "required",
            "rupiah_aset" => "required",
            "merk_barang" => "required",
            "kondisi" => "required",
            "file" => "required|mimes:jpg,png,jpeg|max:10048"
        ]);
        $newImageName = time() . '-' . Str::slug($request->nama_barang) . '.' . $request->file->extension();

        $request->file->move(public_path('image'), $newImageName);

        // berikan nomor aset
        $jenis = Inventaris::where('jenis_id', '=', $request->jenis_aset)->orderBy('no_aset', 'desc')->first();
        $no_aset = ($jenis) ? (int)$jenis->no_aset + 1 : 1;

        Inventaris::create([
            "nama_aset" => $request->nama_barang,
            "tgl_aset" => $request->tgl_aset,
            "no_aset" => $no_aset,
            "asal_perolehan" => $request->asal_perolehan,
            "rupiah_aset" => $request->rupiah_aset,
            "merk_barang" => $request->merk_barang,
            "kondisi" => $request->kondisi,
            "image" => $newImageName,
            "pengguna_id" => $request->pengguna_aset,
            "jenis_id" => $request->jenis_aset,
        ]);

        return redirect()->route('inventaris');
    }

    public function edit(Inventaris $inventaris)
    {
        // dd($inventaris);
        $jenis = Jenis::latest()->get();
        $pengguna = Pengguna::latest()->get();
        return view('edit_inventaris', ['inventaris' => $inventaris, 'jenis' => $jenis, 'pengguna' => $pengguna]);
    }

    public function update(Request $request, Inventaris $inventaris)
    {
        // dd($request);
        $this->validate($request, [
            "nama_aset" => "required",
            "jenis_aset" => "required",
            "pengguna_aset" => "required",
            "tgl_peroleh" => "required",
            "asal_perolehan" => "required",
            "rupiah_aset" => "required",
            "merk_barang" => "required",
            "kondisi" => "required",
            "file" => "mimes:jpg,png,jpeg|max:10048"
        ]);

        if ($request->file != "") {
            if (file_exists(public_path('image/') . $inventaris->image)) {
                @unlink(public_path('image/') . $inventaris->image);
            }

            $newImageName = time() . '-' . Str::slug($request->nama_aset) . '.' . $request->file->extension();
            $request->file->move(public_path('image'), $newImageName);
        } else {
            $newImageName = $inventaris->image;
        }

        $data = [
            "nama_aset" => $request->nama_aset,
            "tgl_aset" => $request->tgl_peroleh,
            "no_aset" =>  $request->no_aset,
            "asal_perolehan" => $request->asal_perolehan,
            "rupiah_aset" => $request->rupiah_aset,
            "merk_barang" => $request->merk_barang,
            "kondisi" => $request->kondisi,
            "image" => $newImageName,
            "pengguna_id" => $request->pengguna_aset,
            "jenis_id" => $request->jenis_aset,
        ];

        // dd($data);

        $inventaris->update($data);

        return redirect('inventaris');
    }

    public function destroy(Inventaris $inventaris)
    {
        if (file_exists(public_path('image/') . $inventaris->image)) {
            @unlink(public_path('image/') . $inventaris->image);
        }

        $inventaris->delete();

        return back()->with('success', 'Inventaris telah di hapus');
    }
}