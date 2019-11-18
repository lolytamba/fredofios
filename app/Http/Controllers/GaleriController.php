<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\GaleriTransformers;
use Illuminate\Support\Str;
use App\Galeri;
use \File;

class GaleriController extends RestController
{
    protected $transformer = GaleriTransformers::Class;

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = public_path('/Galeri');
    }
    
    public function index()
    {
        $galeri = Galeri::all();
        $response = $this->generateCollection($galeri);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|max:200',
          ]);

        $galeri = new Galeri();
         
        if($request->hasfile('gambar'))
        {
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') .Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $galeri->gambar=$save_name;
        }

        $galeri->judul = $request->judul;
        $galeri->save();    

        $response = $this->generateItem($galeri);
        return $this->sendResponse($response, 200);
        
        //return response()->json(['status' => 'success','msg'=>'Galeri Berhasil Ditambah'],201);
    }

    public function show($id)
    {
        $galeri = Galeri::where('id',$id)->get();
        $response = $this->generateCollection($galeri);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|max:200',
        ]);

        $galeri = Galeri::findOrFail($id);

        if($request->hasfile('gambar'))
        {
            $gambarlama = $this->photos_path . '/' . $galeri->gambar;
            if (file_exists($gambarlama)) {
                unlink($gambarlama);
            }
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $galeri->gambar=$save_name;
        }
        $galeri->judul = $request->judul;
        
        $galeri->save();
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
