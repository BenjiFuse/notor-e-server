<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function share(User $user)
    {
    	
    }
}
