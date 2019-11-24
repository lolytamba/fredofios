<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\VisiTransformers;
use App\Visi;
use \File;

class VisiController extends RestController
{
    protected $transformer = VisiTransformers::Class;

    public function index()
    {
        $visi = Visi::all();
        $response = $this->generateCollection($visi);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'isi_visi' => 'required',
          ]);

        $visi = new Visi();
        $visi->isi_visi = $request->isi_visi;
        $visi->save();    

        $response = $this->generateItem($visi);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $visi = Visi::where('id',$id)->get();
        $response = $this->generateCollection($visi);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'isi_visi' => 'required',
        ]);

        $visi = Visi::findOrFail($id);
        $visi->isi_visi = $request->isi_visi;
        $visi->save();
        
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $visi = Visi::findOrFail($id);
        $visi->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
