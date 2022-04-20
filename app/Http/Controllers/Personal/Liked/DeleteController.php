<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class DeleteController extends Controller
{
   public function __invoke(Post $post){

$posts = auth()->user()->likedPosts()->detach($post->id);



return redirect()->route('personal.liked.index');


   }
}
