<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'posts';
    protected $guarded = [];

    protected $withCount = ['postPopular'];

    public function category()
    {
            return $this->belongsTo(Category::class);

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');

    }

    public function postPopular(){

        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments(){

        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    

    


}
