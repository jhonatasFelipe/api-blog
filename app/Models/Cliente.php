<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['email','nome','site','imagem'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'cliente';


    public function depoimentos(){
        return $this->hasMany(Depoimento::class,'cliente');
    }
}
