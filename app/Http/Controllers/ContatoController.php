<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailContato;

class ContatoController extends Controller
{
    function enviarContato(Request $request){

        $request->validate([
            'nome' => "required",
            'email'=> "required",
            'cel'=> "required",
            'mensagem' =>"required",
            ]);

            $request->fixo  = $request->fixo? $request->fixo:"Não informado.";

       $contato =  new MailContato(
            $request->nome,
            $request->email,
            $request->fixo,
            $request->cel,
            $request->mensagem
        );
        
       \Mail::to('jhonatas1020@gmail.com')
       ->send($contato);
    }
}
