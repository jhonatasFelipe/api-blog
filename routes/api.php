<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);
Route::post('contato', [ContatoController::class,'enviarContato']);


Route::prefix('blog')->middleware('auth:api')->group(function(){

    Route::apiresource('posts',PostController::class);
    Route::prefix('posts')->group(function (){
        Route::patch ('{post}/muda-status',[PostController::class,'changeStatus']);
        Route::get ('{post}/comments',[PostController::class,'showComments']);
        Route::get ('{post}/tags',[PostController::class,'showTags']);
        Route::post ('{post}/tags/add',[PostController::class,'addTags']);
        Route::delete ('{post}/tags/remove',[PostController::class,'removeTags']);

    });

        Route::resource('comments',CommentController::class);
        Route::get('comments/ativados',[CommentController::class,'activedComments']);
        Route::patch('comments/{comment}/ativar',[CommentController::class,'toActiveComment']);
        Route::resource('tags',TagController::class);

        Route::get('tags/{tag}/posts',[TagController::class,'getposts']);
        Route::get('imagens',[ImageController::class,'getAllImages']);
        Route::post('imagens',[ImageController::class,'uploadImage']);

});

Route::patch('depoimento/{depoimento}/muda-status',[DepoimentoController::class,'changeStatus']);
Route::patch('depoimento/{depoimento}/ativar',[DepoimentoController::class,'ativar']);
Route::put('/notifica/{cliente}',[ClienteController::class,'emailParaDepoimento']);
Route::resource('depoimento',DepoimentoController::class);
Route::resource('cliente',ClienteController::Class);

