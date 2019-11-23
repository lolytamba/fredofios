<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\StaffTransformers;
use Illuminate\Support\Str;
use App\Staff;
use \File;

class StaffController extends RestController
{
    protected $transformer = StaffTransformers::Class;

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = public_path('/Staff');
    }
    
    public function index()
    {
        $staff = Staff::all();
        $response = $this->generateCollection($staff);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'nama' => 'required',
            'jabatan' => 'required',
          ]);

        $staff = new Staff();
         
        if($request->hasfile('gambar'))
        {
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') .Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $staff->gambar=$save_name;
        }

        $staff->nama = $request->nama;
        $staff->jabatan = $request->jabatan;

        $staff->save();    

        $response = $this->generateItem($staff);
        return $this->sendResponse($response, 200);
    }

    public function show($id)
    {
        $staff = Staff::where('id',$id)->get();
        $response = $this->generateCollection($staff);
        return $this->sendResponse($response, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        $staff = Staff::findOrFail($id);

        if($request->hasfile('gambar'))
        {
            $gambarlama = $this->photos_path . '/' . $staff->gambar;
            if (file_exists($gambarlama)) {
                unlink($gambarlama);
            }
            $image = $request->file('gambar');
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $image->move($this->photos_path, $save_name);  
            $staff->gambar=$save_name;
        }
        $staff->nama = $request->nama;
        $staff->jabatan = $request->jabatan;
        
        $staff->save();
        return response()->json(['status'=>'success','message' => 'Update sukses'], 200);
    }

    public function destroy($id) //SoftDelete
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

    	return response()->json(['status' => 'success','message'=>'Berhasil menghapus'],202);
    }
}
