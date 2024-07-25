<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;
use Validator;

class ActorController extends Controller
{
    public function index(){
        $actor = Actor::latest()->get();
        $response = [
            'success' => true,
            'message' => 'Data Actor',
            'data' => $actor,
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        // validasi data
        $validator= Validator::make($request->all(),[
            'nama_actor' => 'required',
        ], [
            'nama_actor.required' => 'Masukan Actor',
            'biodata.unique' => 'Biodata!'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'silahkan isi dengan benar ',
                'data' => $validator->errors(),
            ], 400);
        } else {
            $actor = new Actor;
            $actor->nama_actor = $request->nama_actor;
            $actor->biodata = $request->biodata;
            $actor->save();
        }

        if ($actor) {
            return response()->json([
                'success' => true,
                'message' => 'data berhasil disimpan',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data gagal disimpan',
        ], 400);
    }
}

public function show($id)
{
    $actor = Actor::find($id);

    if($actor){
        return response()->json([
            'success' => true,
            'message' => 'Detail Actor',
            'data' => $actor,
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Actor gagal disimpan',
    ], 404);
    }
}

public function update(Request $request, $id)
    {
        // validasi data
        $validator= Validator::make($request->all(),[
            'nama_actor' => 'required',
            'nama_actor' => 'required',
        ], [
            'nama_actor.required' => 'Masukan Actor',
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'silahkan isi dengan benar ',
                'data' => $validator->errors(),
            ], 400);
        } else {
            $actor = Actor::find($id);
            $actor->nama_actor = $request->nama_actor;
            $actor->save();
        }

        if ($actor) {
            return response()->json([
                'success' => true,
                'message' => 'data berhasil diperbarui',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data gagal diperbarui',
        ], 400);
    }
}

public function destroy($id){
    $actor = Actor::find($id);
    $actor->delete();
    return response()->json([
        'success' => true,
        'message' => 'data' .$actor->nama_actor . 'berhasil dihapus',
    ]);

}
}
