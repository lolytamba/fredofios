<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\AkademikTransformers;
use Illuminate\Support\Str;
use App\Akademik;
use \File;

class AkademikController extends RestController
{
    protected $transformer = AkademikTransformers::Class;

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = public_path('/Akademik');
    }
    
    public function index()
    {
        $akademik = Akademik::all();
        $response = $this->generateCollection($akademik);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'keterangan' => 'required',
          ]);

        $akademik = new Akademik();
         
        if($request->hasfile('gambar'))
        {
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') .Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $akademik->gambar=$save_name;
        }

        $akademik->judul = $request->judul;
        $akademik->keterangan = $request->keterangan;

        $akademik->save();    

        $response = $this->generateItem($akademik);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $akademik = Akademik::where('id',$id)->get();
        $response = $this->generateCollection($akademik);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        $akademik = Akademik::findOrFail($id);

        if($request->hasfile('gambar'))
        {
            $gambarlama = $this->photos_path . '/' . $akademik->gambar;
            if (file_exists($gambarlama)) {
                unlink($gambarlama);
            }
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $akademik->gambar=$save_name;
        }
        $akademik->judul = $request->judul;
        $akademik->keterangan = $request->keterangan;
        
        $akademik->save();
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $akademik = Akademik::findOrFail($id);
        $akademik->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}