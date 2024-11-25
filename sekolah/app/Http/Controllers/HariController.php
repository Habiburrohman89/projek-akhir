<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Hari;

class HariController extends Controller
{
    //
    public function index()
    {
        $hari = Hari::all();

        return response()->json($hari);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $hari = Hari::create([
            'nama'   => $request->nama,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Ditambahkan!',
            'data' => $hari
        ]);
    }

    public function show($id)
    {
        $hari = Hari::find($id);
        return response()->json([
            'success' => true,
            'mesage' => 'Detail Data Hari!',
            'data' => $hari
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $hari = Hari::find($id);
        $hari->update([
            'nama'   => $request->nama,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Diubah!',
            'data' => $hari
        ]);
    }

    public function destroy($id)
    {
        $hari = Hari::find($id);

        $hari->delete();
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Dihapus!',
            'data' => $hari
        ]);
    }
}
