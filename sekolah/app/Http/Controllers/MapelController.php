<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mapel;

class MapelController extends Controller
{
    //
    public function index()
    {
        $mapel = Mapel::all();

        return response()->json($mapel);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $mapel = Mapel::create([
            'kode'     => $request->kode,
            'nama'   => $request->nama,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Ditambahkan!',
            'data' => $mapel
        ]);
    }

    public function show($id)
    {
        $mapel = Mapel::find($id);
        return response()->json([
            'success' => true,
            'mesage' => 'Detail Data Mapel!',
            'data' => $mapel
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $mapel = Mapel::find($id);
        $mapel->update([
            'kode'     => $request->kode,
            'nama'   => $request->nama,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Diubah!',
            'data' => $mapel
        ]);
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);

        $mapel->delete();
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Dihapus!',
            'data' => $mapel
        ]);
    }
}
