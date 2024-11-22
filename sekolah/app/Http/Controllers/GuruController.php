<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guru;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();

        return response()->json($guru);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $guru = Guru::create([
            'nip'     => $request->nip,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Ditambahkan!',
            'data' => $guru
        ]);
    }

    public function show($id)
    {
        $guru = Guru::find($id);
        return response()->json([
            'success' => true,
            'mesage' => 'Detail Data Guru!',
            'data' => $guru
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $guru = Guru::find($id);
        $guru->update([
            'nip'     => $request->nip,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Guru Berhasil Diubah!',
            'data' => $guru
        ]);
    }

    public function destroy($id)
    {
        $guru = Guru::find($id);

        $guru->delete();
        return response()->json([
            'success' => true,
            'mesage' => 'Data Guru Berhasil Dihapus!',
            'data' => $guru
        ]);
    }
}
