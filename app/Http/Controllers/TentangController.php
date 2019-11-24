<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\TentangTransformers;
use App\Tentang;
use \File;


class TentangController extends RestController
{
    protected $transformer = TentangTransformers::Class;

    public function index()
    {
        $tentang = Tentang::all();
        $response = $this->generateCollection($tentang);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'isi_tentang' => 'required',
          ]);

        $tentang = new Tentang();
        $tentang->isi_tentang = $request->isi_tentang;
        $tentang->save();    

        $response = $this->generateItem($tentang);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $tentang = Tentang::where('id',$id)->get();
        $response = $this->generateCollection($tentang);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'isi_tentang' => 'required',
        ]);

        $tentang = Tentang::findOrFail($id);
        $tentang->isi_tentang = $request->isi_tentang;
        $tentang->save();
        
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $tentang = Tentang::findOrFail($id);
        $tentang->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
