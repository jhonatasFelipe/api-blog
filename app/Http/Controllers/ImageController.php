<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class imageController extends Controller
{
    private $path;


    function __construct(){
        $this->path = \public_path('img/imagem_post');
    }

    public function uploadImage(Request $request){
        $image = $request->file('image');
        $path_image = $image->store("","blog");
        return ["imagem"=>$path_image];
    }

    public function deleteImage(){

    }

    public function getAllImages(){

        $imagens = [];

        $diretorio = dir($this->path);
       while($arquivo = $diretorio->read()){
           Array_push($imagens,env("APP_IMAGES").$arquivo);
        }
        return $imagens;
    }
}
