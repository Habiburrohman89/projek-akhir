<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    //
    public function index()
    {
        $jadwal = Jadwal::all();

        return response()->json($jadwal);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'hari_id' => 'required',
            'kelas_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $jadwal = Jadwal::create([
            'hari_id'     => $request->hari_id,
            'kelas_id'   => $request->kelas_id,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Ditambahkan!',
            'data' => $jadwal
        ]);
    }

    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        return response()->json([
            'success' => true,
            'mesage' => 'Detail Data Jadwal!',
            'data' => $jadwal
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'hari_id' => 'required',
            'kelas_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $jadwal = Jadwal::find($id);
        $jadwal->update([

            'hari_id'     => $request->hari_id,
            'kelas_id'   => $request->kelas_id,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Diubah!',
            'data' => $jadwal
        ]);
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);

        $jadwal->delete();
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Dihapus!',
            'data' => $jadwal
        ]);
    }
}
