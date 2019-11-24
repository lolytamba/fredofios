<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\CarouselTransformers;
use Illuminate\Support\Str;
use App\Carousel;
use \File;

class CarouselController extends RestController
{
    protected $transformer = CarouselTransformers::Class;

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = public_path('/Carousel');
    }
    
    public function index()
    {
        $carousel = Carousel::all();
        $response = $this->generateCollection($carousel);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
          ]);

        $carousel = new Carousel();
         
        if($request->hasfile('gambar'))
        {
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') .Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $carousel->gambar=$save_name;
        }

        $carousel->judul = $request->judul;
        $carousel->save();    

        $response = $this->generateItem($carousel);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $carousel = Carousel::where('id',$id)->get();
        $response = $this->generateCollection($carousel);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
        ]);

        $carousel = Carousel::findOrFail($id);

        if($request->hasfile('gambar'))
        {
            $gambarlama = $this->photos_path . '/' . $carousel->gambar;
            if (file_exists($gambarlama)) {
                unlink($gambarlama);
            }
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $carousel->gambar=$save_name;
        }
        $carousel->judul = $request->judul;
        
        $carousel->save();
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
