<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        // lazy loading di 30 post
        $posts = Post::with("category", "user")->paginate(30);

        return response()->json([
            'succes' => true,
            'results' => $posts
        ]);
    }

    public function show(Post $post){
        // eager loading del mio singolo post via D. I.
        $post->loadMissing("category", "user");

        return response()->json([
            'succes' => true,
            'results' => $post
        ]);
    }
}
