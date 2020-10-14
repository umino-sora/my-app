<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function prefecture()
    {
        return $this->hasOne('App\Prefecture');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
  
    public function likedBy($user)
    {
        return Like::where('user_id', $user->id)->where('post_id', $this->id);
    }
  
}
