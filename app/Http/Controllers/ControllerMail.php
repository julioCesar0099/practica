<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class ControllerMail extends Controller
{
    function index()
    {
        $articulos =[
            '¿Como postular a una convocatoria?','¿Como generar el rotulo?','¿Como puedo ver las notas?'
        ];
        $title = 'Ayuda';
        return view('form',compact('title', 'articulos'));
    }
    function send(Request $request)
    {
        $this->validate($request, [
            'message' =>  'required'
           ]);
           
        $data = array(            
            'message' => $request->input('message')
          );
      
        $email = "rodri.ledezma9483@gmail.com";
      
        Mail::to($email)->send(new SendMail($data));
        return back()->with('success', 'Enviado exitosamente!');
    }
    
}
/*AIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=rodri.ledezma9483@gmail.com
MAIL_PASSWORD=vadecwmihjiwcubt
MAIL_ENCRYPTION=tls*/