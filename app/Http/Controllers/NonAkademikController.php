<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\NonAkademikTransformers;
use Illuminate\Support\Str;
use App\NonAkademik;
use \File;

class NonAkademikController extends RestController
{
    protected $transformer = NonAkademikTransformers::Class;

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = public_path('/NonAkademik');
    }
    
    public function index()
    {
        $nonakademik = NonAkademik::all();
        $response = $this->generateCollection($nonakademik);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'keterangan' => 'required',
          ]);

        $nonakademik = new NonAkademik();
         
        if($request->hasfile('gambar'))
        {
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') .Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $nonakademik->gambar=$save_name;
        }

        $nonakademik->judul = $request->judul;
        $nonakademik->keterangan = $request->keterangan;
        $nonakademik->save();    

        $response = $this->generateItem($nonakademik);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $nonakademik = NonAkademik::where('id',$id)->get();
        $response = $this->generateCollection($nonakademik);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        $nonakademik = NonAkademik::findOrFail($id);

        if($request->hasfile('gambar'))
        {
            $gambarlama = $this->photos_path . '/' . $nonakademik->gambar;
            if (file_exists($gambarlama)) {
                unlink($gambarlama);
            }
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $nonakademik->gambar=$save_name;
        }
        $nonakademik->judul = $request->judul;
        $nonakademik->keterangan = $request->keterangan;

        $nonakademik->save();
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $nonakademik = NonAkademik::findOrFail($id);
        $nonakademik->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
