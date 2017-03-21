<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['text', 'archived', 'user_id'];
	protected $gaurded = ['id'];		// [!] Likely need to include user_id here

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function share(User $user)
    {
    	
    }
}
