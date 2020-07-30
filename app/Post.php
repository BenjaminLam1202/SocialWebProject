<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\BrNotification;

class Post extends Model
{
        protected $fillable = [
      'title', 'des','category','category_id', 'user_id',
  ];


    public function comments()
    {
      return $this->morphMany('App\Comment', 'commentable')->whereNull('parent_id');
    }
    public function reactions()
    {
      return $this->hasMany(Reaction::class)->orderby('created_at','DESC');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    
}
