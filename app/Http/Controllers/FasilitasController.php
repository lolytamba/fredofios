<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\FasilitasTransformers;
use Illuminate\Support\Str;
use App\Fasilitas;
use \File;

class FasilitasController extends RestController
{
    protected $transformer = FasilitasTransformers::Class;

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = public_path('/Fasilitas');
    }
    
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $response = $this->generateCollection($fasilitas);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
          ]);

        $fasilitas = new Fasilitas();
         
        if($request->hasfile('gambar'))
        {
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') .Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $fasilitas->gambar=$save_name;
        }

        $fasilitas->judul = $request->judul;
        $fasilitas->save();    

        $response = $this->generateItem($fasilitas);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $fasilitas = Fasilitas::where('id',$id)->get();
        $response = $this->generateCollection($fasilitas);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);

        if($request->hasfile('gambar'))
        {
            $gambarlama = $this->photos_path . '/' . $fasilitas->gambar;
            if (file_exists($gambarlama)) {
                unlink($gambarlama);
            }
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $fasilitas->gambar=$save_name;
        }
        $fasilitas->judul = $request->judul;
        
        $fasilitas->save();
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
