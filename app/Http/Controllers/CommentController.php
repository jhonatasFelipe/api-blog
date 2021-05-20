<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Comment::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
         $comment->delete();
         return $comment;
    }

    public function selectByPost(Comment $comment){
        return $comment->post();
    }

    public function activeComments(){
       // return Comments::where('liberado',true);
    }

    public function toActiveComment(Comment $comment , Request $request){
        $comment->liberado = $request->liberado;
        $comment->update();
        return $comment;
    }
}

