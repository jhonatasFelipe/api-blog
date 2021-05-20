<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =['body', 'post','email','name','liberado'];
    protected $hidden = ['created_at','updated_at'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

}

