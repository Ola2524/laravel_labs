<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index(){
        // $posts = Post::all();
        $posts = Post::paginate(5)->fragment('posts');;
        foreach($posts as $post){
            $dt = Carbon::parse($post['created_at']);
            $d = $dt->year."-".$dt->month."-".$dt->day;
            $created_at = array($d);
        }
        return view("posts.index",['posts' => $posts,'created_at' => $created_at]);
    }

    public function create(){
        $users = User::all();
        return view("posts.create",["users"=>$users]);
    }

    public function store(StorePostRequest $request){
        // $request->validate([
        //     'title'=>['required','min:3'],
        //     'description'=>['required','min:5'],
        // ],[
        //     'title.required' => 'Enter Title',
        //     'title.min' => 'Enter at least 3 character at title',
        //     'description.required' => 'Enter Description',
        //     'description.min' => 'Enter at least 3 character at title'
        // ]);

        $data = request()->all();
        $title = $data['title'];
        $description = $data['description'];
        $post_creator = $data['post_creator'];

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator

        ]);

        return redirect()->route("posts.index");
    }

    public function show($id){
        $post = Post::where("id",$id)->first();
        return view("posts.show",['post' => $post]);
    }

    
    public function edit($id){
        $post = Post::where("id",$id)->first();
        $users = User::all();
        return view("posts.edit",['post' => $post,"users"=>$users]);
    }

    public function update(Post $id, Request $request){
            $request->validate([
            'title'=>['required','min:3,unique:posts'.$id],
            'description'=>['required','min:10'],
        ],[
            'title.required' => 'Enter Title',
            'title.min' => 'Enter at least 3 character at title',
            'description.required' => 'Enter Description',
            'description.min' => 'Enter at least 10 character at title'
        ]);

        $data = request()->all();
        $title = $data['title'];
        $description = $data['description'];
        $post_creator = $data['post_creator'];
        $id->update([
            'title' => $title,
            'description' => $description, 
            'user_id' => $post_creator, 
        ]);
        return redirect("posts");
    }

    public function destroy(Post $id){
        $id->delete();
        return back();
    }
}
