<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class IndexController extends Controller
{
   public function __invoke(){

    
      
return view('personal.comment.index');

   }
}
