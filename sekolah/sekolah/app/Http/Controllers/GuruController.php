<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
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
        $validator = Validator::make($request->all(), [
            'nip'   => 'required|unique:gurus,nip',
            'nama'  => 'required',
            'mapel'  => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'nohp'  => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $guru = Guru::create([
            'nip'    => $request->nip,
            'nama'   => $request->nama,
            'mapel'   => $request->mapel,
            'kelas'  => $request->kelas,
            'alamat' => $request->alamat,
            'nohp'   => $request->nohp,

        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Guru Berhasil Ditambahkan!',
            'data'    => $guru
        ], 201);
    }
    public function show($id)
    {

        $guru = Guru::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Guru!',
            'data'    => $guru
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nip'     => 'required|unique:gurus,nip,' . $id,
            'nama'    => 'required',
            'mapel'    => 'required',
            'kelas'   => 'required',
            'alamat'  => 'required',
            'nohp'    => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['error' => 'Guru not found'], 404);
        }

        $guru->nis = $request->nip;
        $guru->nama = $request->nama;
        $guru->mapel = $request->mapel;
        $guru->kelas = $request->kelas;
        $guru->alamat = $request->alamat;
        $guru->nohp = $request->nohp;



        $guru->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Guru Berhasil Diubah!',
            'data'    => $guru
        ], 200);
    }
    public function destroy($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json([
                'success' => false,
                'message' => 'Guru tidak ditemukan!'
            ], 404);
        }

        $guru->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Guru Berhasil Dihapus!',
            'data'    => $guru
        ], 200);
    }
}
