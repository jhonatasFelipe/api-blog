<?php

namespace App\Http\Controllers;
use App\Models\Depoimento;


use Illuminate\Http\Request;

class DepoimentoController extends Controller
{
    public function index(Request $request)
    {

        $depoimentos = Depoimento::with('cliente');

        if($request->has('nome')){
            $depoimentos->where('nome','Like','%'.$request->query('nome').'%');
        }

        if($request->has('email')){
            $depoimentos->where('email','Like','%'.$request->query('email').'%');
        }

        if($request->has('texto')){
            $depoimentos->where('texto','Like','%'.$request->query('texto').'%');
        }

        if($request->has('cliente')){
            $depoimentos->where('cliente',$request->query('cliente'));
        }

        if($request->has('status')){
            $depoimentos->where('status',$request->query('status'));
        }

        if($request->has('ativado')){
            $depoimentos->where('ativado',$request->query('ativado'));
        }

        return $depoimentos->get(); 
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
           "nome"=>"required",
           "email"=>"required",
           "cliente"=>"required",
           "texto"=>"required",
       ]);

       $depoimento = new Depoimento();
       $depoimento->nome = $request->nome;
       $depoimento->email = $request->email;
       $depoimento->texto = $request->texto;
       $depoimento->data = \date('Y-m-d');
       $depoimento->liberado = false;
       $depoimento->cliente = $request->cliente;
       $depoimento->status = "Não Enviado";
       $depoimento->save();
       return $depoimento;
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depoimento  $depoimento
     * @return \Illuminate\Http\Response
     */
    public function show(Depoimento $depoimento)
    {
       return  $depoimento;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depoimento  $depoimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Depoimento  $depoimento)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depoimento  $depoimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Depoimento  $depoimento)
    {
       
        $request->validate([
            "nome"=>"required",
            "email"=>"required",
            "texto"=>"required",
        ]);

        $depoimento->nome = $request->nome;
        $depoimento->email = $request->email;
        $depoimento->texto = $request->texto;
        $depoimento->save();
        return $depoimento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depoimento  $depoimentot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depoimento  $depoimento)
    {
        $depoimento->delete();
    }

    public function changeStatus(Request $request , Depoimento  $depoimento){
      $request->validate([
          "status" => "required"
      ]);

      $depoimento->status = $request->status;
      $depoimento->update();
      return $depoimento;
    }

    public function ativar(Request $request , Depoimento  $depoimento){
        $request->validate([
            "liberado"=>"required"
        ],
        [
            "liberado.required"=>"Campo liberado é obrigatório"
        ]);
  
        $depoimento->liberado = $request->liberado;
        $depoimento->update();
        return $depoimento;
      }

  
}
