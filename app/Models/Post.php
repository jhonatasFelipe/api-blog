<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable =['title','text','datapost','image','ativado','author'];
    protected $hidden  = ['created_at', 'updated_at'];

    public function comments(){
        return $this->hasMany(Comment::class,'post');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->select('id','name');
    }

    public function author(){
        return $this->belongsTo(User::class);
    }
}
