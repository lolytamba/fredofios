<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use Mail;
use App\Mail\ContactMail;

class KontakController extends Controller
{
    public function index(){
        $kontaks = Kontak::all();
        $response = $this->generateCollection($kontaks);
        return $this->sendResponse($response, 200);
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'nama' => 'required|max:50',
            'email' => 'required|email',
            'nohp' => 'required|max:12',
            'pesan' => 'required',
          ]);

        $kontak = new Kontak();
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $kontak->nohp = $request->nohp;
        $kontak->pesan = $request->pesan;
        $kontak->save();    

        $kontak = array(
            'nama' => $request->nama,
            'email'=> $request->email,
            'nohp' => $request->nohp,
            'pesan' => $request->pesan,
        );

        Mail::send('email', $kontak,
        function($message) use ($kontak) {
            $message->from($kontak['email']);
            $message->to('jovanca55@gmail.com');
            $message->subject('Pesan/Pertanyaan untuk Fredofios');
        });
        
        return response()->json(['status' => 'success','msg'=>'Pesan berhasil dikirim'],201);
    }
}
