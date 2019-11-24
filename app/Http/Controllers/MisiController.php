<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\MisiTransformers;
use App\Misi;
use \File;

class MisiController extends RestController
{
    protected $transformer = MisiTransformers::Class;

    public function index()
    {
        $misi = Misi::all();
        $response = $this->generateCollection($misi);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'isi_misi' => 'required',
          ]);

        $misi = new Misi();
        $misi->isi_misi = $request->isi_misi;
        $misi->save();    

        $response = $this->generateItem($misi);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $misi = Misi::where('id',$id)->get();
        $response = $this->generateCollection($misi);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'isi_misi' => 'required',
        ]);

        $misi = Misi::findOrFail($id);
        $misi->isi_misi = $request->isi_misi;
        $misi->save();
        
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $misi = Misi::findOrFail($id);
        $misi->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
