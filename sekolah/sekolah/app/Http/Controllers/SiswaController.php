<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
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
        $validator = Validator::make($request->all(), [
            'nis'   => 'required|unique:siswas,nis',
            'nama'  => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa = Siswa::create([
            'nis'    => $request->nis,
            'nama'   => $request->nama,
            'kelas'  => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Siswa Berhasil Ditambahkan!',
            'data'    => $siswa
        ], 201);
    }
    public function show($id)
    {

        $siswa = Siswa::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Siswa!',
            'data'    => $siswa
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nis'     => 'required',
            'nama'    => 'required',
            'kelas'   => 'required',
            'alamat'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json(['error' => 'Siswa not found'], 404);
        }

        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;


        $siswa->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Siswa Berhasil Diubah!',
            'data'    => $siswa
        ], 200);
    }
    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'success' => false,
                'message' => 'Siswa tidak ditemukan!'
            ], 404);
        }

        $siswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Siswa Berhasil Dihapus!',
            'data'    => $siswa
        ], 200);
    }
}
