<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    protected $fillable = ['email','nome','cliente','texto','data','liberado','status'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = "depoimento";


    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente');
    }
}


