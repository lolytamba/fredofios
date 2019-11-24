<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\ArtikelTransformers;
use Illuminate\Support\Str;
use App\Artikel;
use \File;

class ArtikelController extends RestController
{
    protected $transformer = ArtikelTransformers::Class;

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = public_path('/Artikel');
    }
    
    public function index()
    {
        $artikel = Artikel::all();
        $response = $this->generateCollection($artikel);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'diskripsi' => 'required',
            'konten' => 'required',
          ]);

        $artikel = new Artikel();
         
        if($request->hasfile('gambar'))
        {
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') .Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $artikel->gambar=$save_name;
        }

        $artikel->judul = $request->judul;
        $artikel->diskripsi = $request->diskripsi;
        $artikel->konten = $request->konten;

        $artikel->save();    

        $response = $this->generateItem($artikel);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $artikel = Artikel::where('id',$id)->get();
        $response = $this->generateCollection($artikel);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'diskripsi' => 'required',
            'konten' => 'required',
        ]);

        $artikel = Artikel::findOrFail($id);

        if($request->hasfile('gambar'))
        {
            $gambarlama = $this->photos_path . '/' . $artikel->gambar;
            if (file_exists($gambarlama)) {
                unlink($gambarlama);
            }
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $artikel->gambar=$save_name;
        }
        $artikel->judul = $request->judul;
        $artikel->diskripsi = $request->diskripsi;
        $artikel->konten = $request->konten;
        
        $artikel->save();
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
