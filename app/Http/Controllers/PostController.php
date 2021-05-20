<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resultado = new Post;
        if($request->query()){
            $pesquisa = $request->query('pesquisa');
            $ano =  $request->query('ano');
            $mes = $request->query('mes');
            $ativado = $request->query('ativado');
                
            if(!is_null($pesquisa)){
                  $resultado =  $resultado->where('text', 'like','%'.$pesquisa.'%');
                }
            if($mes & $ano){
                    $resultado-> where('datapost', 'like','%'.$ano.'-'.$mes.'%');
                }
            if($ano){
                  $resultado =  $resultado::whereYear('datapost',$ano); 
                }
            if(!is_null($ativado)){
               $resultado =  $resultado->where('ativado',$ativado);
            }
         return $resultado->paginate(10);
        }
     
        return $resultado->paginate(10);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
                'text' =>'required',
                'datapost'=>'required',
                'image' =>'required'
            ],

            [
                'title.required'=>'O campo titulo é obrigatório',
                'text.required'=>'O campos texto é obrigatório',
                'datapost.required'=>'O campo datapost é obrigatorio',
                'image.required' =>'O campo imagem é obrigatório'
            ]
        );
        $title = $request->get('title');
        $text = $request->get('text');
        $datapost = $request->get('datapost');
        $image = $request->file('image');
        

        $post = new Post();
        $post->title = $title;
        $post->text = $text;
        $post->datapost = $datapost;
        $post->ativado = false;
        $post->author = 1;
        $path_image = env("APP_IMAGES").$image->store("","blog");
        $post->image = $path_image;
       
        $post->save();

        return $post;
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response("teste de metodo");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
       $post->title = $request->title;
       $post->text = $request->text;
       if(!is_null($request->image)){
        $image = $request->image;
        $post->image = env("APP_IMAGES").$image->store('', 'blog');
       }
       $post->update();
       return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $post;
    }

    public function showComments(Post $post,Request $request)
    {
        if($request->liberado){
            return $post->comments()->where('liberado',$request->liberado)->paginate(10);
        }
        return $post->comments()->paginate(10);
    }

    public function showTags(Post $post)
    {
        return $post->tags;
    }

    public function addTags(Request $request ,Post $post)
    {
        return $post->tags()->attach($request->all());
    }

    public function removeTags(Request $request ,Post $post)
    {
        return $post->tags()->detach($request->all());
    }

    public function changeStatus(Request $request , Post $post){
        $post->ativado = $request->ativado;
        $post->save();
        return $post;
    }

}
