<?php

namespace App\Http\Controllers\Post;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ShowController extends Controller
{
   public function __invoke(Post $post){

       $date = Carbon::parse($post->created_at);

      //  $relatedPosts = Post::where('category_id', $post->category_id)
      //  ->where('id', '!=', $post->id)
      //  ->get()
      //  ->take(3);


      // dd(Post::find(1)->comments->pluck('comment_text'));
      // dd(Post::whereIn('category_id', [1, 2])->get());
      //    dd(Post::whereHas('postPopular')->get());

      $relatedPosts = Post::whereHas('tags', fn (Builder $query) => $query
      ->whereIn('tag_id', $post->tags->modelKeys())
      ->where('post_id', '!=', $post->tags->modelKeys()))
      ->get()->take(3);
      
      



     

return view('post.show', compact('post', 'date', 'relatedPosts'));

   }
}
