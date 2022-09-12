<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Auth;

class PostController extends Controller
{
    //

    public function create(){
        return view('posts.create');
    }

    public function store(PostFormRequest $request){
        
        $data = $request->validated();

        $post = Post::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'img_src'=>$data['img_src'],
            'user_id'=>Auth::user()->id,
            'avg_rating'=>0
        ]);
        return redirect('/create-post')->with('message', 'Post created Successfully');
    }
}
