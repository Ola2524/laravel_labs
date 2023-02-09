<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return PostResource :: collection($posts);
        
        //$response = [];

        // foreach($posts as $post){
        //     $response [] = [
        //         'id' => $post->id,
        //         'title' => $post->title,
        //     ];
        // }

        //return $response;
    }

    public function show($id){
        $post = Post::find($id);
        // return [
        //     'id' => $post->id,
        //     'title' => $post->title,
        // ];
        return new PostResource($post);
    }

    public function store(StorePostRequest $request){
        $data = request()->all();
        $title = $data['title'];
        $description = $data['description'];
        $post_creator = $data['post_creator'];

        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator

        ]);

        return $post;
    }
}
