<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\PostPublished;

class PostController extends Controller
{
    public function post(Request $request)
    {
        // Some form request validation code here

        $post = Post::create($request->all());

        // Dispatch an event for sending email to subscribers
        PostPublished::dispatch($post);

        // Other response code...
    }
}
