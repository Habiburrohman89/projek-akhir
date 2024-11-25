<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\GuruMapel;

class GurumapelController extends Controller
{
    //
    public function index()
    {
        $gurumapel = GuruMapel::all();

        return response()->json($gurumapel);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'guru_id' => 'required',
            'mapel_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $gurumapel = GuruMapel::create([
            'guru_id'     => $request->guru_id,
            'mapel_id'   => $request->mapel_id,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Ditambahkan!',
            'data' => $gurumapel
        ]);
    }

    public function show($id)
    {
        $gurumapel = GuruMapel::find($id);
        return response()->json([
            'success' => true,
            'mesage' => 'Detail Data!',
            'data' => $gurumapel
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'guru_id' => 'required',
            'mapel_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $gurumapel = GuruMapel::find($id);
        $gurumapel->update([
            'guru_id'     => $request->guru_id,
            'mapel_id'   => $request->mapel_id,
        ]);
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Diubah!',
            'data' => $gurumapel
        ]);
    }

    public function destroy($id)
    {
        $gurumapel = GuruMapel::find($id);

        $gurumapel->delete();
        return response()->json([
            'success' => true,
            'mesage' => 'Data Berhasil Dihapus!',
            'data' => $gurumapel
        ]);
    }
}
