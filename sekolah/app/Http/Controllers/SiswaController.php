<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();

        return response()->json($siswa);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $siswa = Siswa::create([
            'nis'     => $request->nis,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Ditambahkan!',
            'data' => $siswa
        ]);
    }
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return response()->json([
            'success' => true,
            'mesage' => 'Detail Data Siswa!',
            'data' => $siswa
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $siswa = Siswa::find($id);
        $siswa->update([
            'nis'     => $request->nis,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Siswa Berhasil Diubah!',
            'data' => $siswa
        ]);
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        $siswa->delete();
        return response()->json([
            'success' => true,
            'mesage' => 'Data Siswa Berhasil Dihapus!',
            'data' => $siswa
        ]);
    }
}
