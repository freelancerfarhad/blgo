<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function owners()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function userpost()
    {
        return $this->belongsTo(UserPost::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
    public function likeanddislikes()
    {
        return $this->likes()->where('user_id',auth()->id())->exists();
    }
}
