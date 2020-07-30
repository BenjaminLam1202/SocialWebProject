<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
	protected $fillable = ['user_id'];
    public function reactionable()
    {
        return $this->morphTo();
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }    
    public function post()
    {
      return $this->belongsTo(Post::class);
    }
}
