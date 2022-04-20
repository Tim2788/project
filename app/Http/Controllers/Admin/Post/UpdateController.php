<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Store;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\Update;
use App\Http\Controllers\Admin\Post\BaseController;


class UpdateController extends BaseController
{
   public function __invoke(Update $request, Post $post){

    $data = $request->validated();
    $post = $this->service->update($data, $post);

return view('admin.posts.show', compact('post'));

   }
}
