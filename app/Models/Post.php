<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

public function user()
{
   return $this->belognsTo(User::class);
}
public function tags()
{
    return $this->belongsToMany(Tag::class);
}
public function comments()
{
    return $this->hasMany(Comment::class);
}
public function likes()
{
    return $this->morphMany(Like::class,'likeable');
}
public function likeanddislikes()
{
    return $this->likes()->where('user_id',auth()->id())->exists();
}
public function owners()
{
    return $this->belongsTo(User::class,'user_id');
}
public function category()
{
    return $this->belongsTo(Category::class,'user_id');
}
}