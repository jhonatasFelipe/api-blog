<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Mail\NotificaDepoimento;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::select("*");

        if($request->has('nome')){
            $clientes->where('nome','Like','%'.$request->query('nome').'%');
        }

        if($request->has('email')){
            $clientes->where('email','Like','%'.$request->query('email').'%');
        }

        if($request->has('site')){
            $clientes->where('site','Like','%'.$request->query('site').'%');
        }

        return $clientes->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email'=> 'required|email',
            'site' => 'Url',
            'imagem' => 'image'

        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->site = $request->site;
        if($request->has('imagem')){
            $path_image = env("APP_IMAGES").$request->imagem->store("clientes","blog");
            $cliente->imagem = $path_image;
        }
        $cliente->save();
        return $cliente;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'string',
            'email'=> 'email',
            'site' => 'Url',
            'imagem' => 'image'
        ]);

        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->site = $request->site;
        if($request->has('imagem')){
            $path_image = env("APP_IMAGES").$request->imagem->store("clientes","blog");
            $cliente->imagem = $path_image;
        }
        $cliente->update();
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if($cliente->delete()){
            return ['status' => 'true'];
        }   
    }

    public function emailParaDepoimento(Cliente $cliente){
        $notify = new NotificaDepoimento($cliente);
        \Mail::to($cliente->email)
        ->send($notify);
       return $notify;
    }
}
