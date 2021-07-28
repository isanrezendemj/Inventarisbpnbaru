<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\logController;
use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Log;
use App\Models\Mobile;
use Illuminate\Http\Request;

class inventarisController extends Controller
{
    public function show($code)
    {
        $ItemCode = explode('-', $code);
        $jenis = Jenis::where('kode_jenis', '=', $ItemCode[0])->get()->first();

        if (!$jenis) {
            return response()->json(null, 404);
        }

        $jenis_id = $jenis->id;
        $inventaris = Inventaris::where('no_aset', '=', $ItemCode[1])->where('jenis_id', '=', $jenis_id)->get()->first();

        return response()->json([
            "id" => $inventaris->id,
            "nama_barang" => $jenis->nama_jenis,
            "tgl_peroleh" => $inventaris->tgl_aset,
            "asal_perolehan" => $inventaris->asal_perolehan,
            "rupiah_aset" => $inventaris->rupiah_aset,
            "tempat_aset" => $inventaris->pengguna->nama_pengguna,
            "merk_barang" => $inventaris->merk_barang,
            "kondisi" => $inventaris->kondisi,
            "image" => asset('image/' . $inventaris->image),
        ], 200);
    }

    public function update(Request $request)
    {
        if ($request->token == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9') {
            $security = Mobile::where('kode_akses', '=', $request->security)->get()->first();
            if ($security->status == 1) {
                $ItemCode = explode('-', $request->code);
                $jenis = Jenis::where('kode_jenis', '=', $ItemCode[0])->get()->first();
                if (!$jenis) return response()->json(null, 404);
                $jenis_id = $jenis->id;
                $inventaris = Inventaris::where('no_aset', '=', $ItemCode[1])->where('jenis_id', '=', $jenis_id)->get()->first();
                $inventaris->update([
                    'kondisi' => $request->kondisi
                ]);
                Log::create([
                    'nama' => $security->nama,
                    'aksi' => htmlentities('mengubah kondisi aset <b>' . $request->code . '</b> menjadi <b>' . $request->kondisi . '</b>')
                ]);

                return response()->json([
                    'response' => 200,
                    'status' => 'OK',
                    'msg' => 'Update Success'
                ], 201);
            } elseif ($security->status == 0) {
                return response()->json([
                    'response' => 403,
                    'status' => 'Forbidden',
                    'msg' => 'security code is not active'
                ], 403);
            } else {
                return response()->json([
                    'response' => 403,
                    'status' => 'Forbidden',
                    'msg' => 'security code not registered! access denied'
                ], 403);
            }
        } else {
            return response()->json([
                'response' => 403,
                'status' => 'Forbidden',
                'msg' => 'Token Salah'
            ], 403);
        }
    }
}