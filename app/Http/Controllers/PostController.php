<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Auth;

class PostController extends Controller
{
    //

    // return create view
    public function create(){
        return view('posts.create');
    }

    // create the post with user's input
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

    
    public function dosearch(Request $request){
        
        $search = $request->get('search');
        $posts = Post::where('title', 'like', '%'.$search.'%')->paginate(30);
        //return redirect('search/'.$search)->with( ['search' => $search,'searchposts' => $posts] );
        return view('posts.search', compact('search', 'posts'));
    }
    
    // return all posts to allposts view blade
    public function allposts(){
        $posts = Post::paginate(5);

        $posts->map(function ($post) {
            $post['username'] = 'hi';
            return $post;
        });

        foreach ($posts as &$post){
            //$user = User::where('id', $post->user_id)->get();
            
            //$post['username'] = $user->username;
        }
        return view('posts.allposts', compact('posts'));
    }


    // return user's post to mypost view blade
    public function myposts(){
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.myposts', compact('posts'));
    }

    // return edit view blade. Recieve specific post from user button click, pass post to view blade
    public function edit($post_id)
    {
        $post = Post::find($post_id);

        if ($post->user_id !== Auth::user()->id){
            return redirect('/');
        }
        else {
            return view('posts.edit',compact('post'));
        }
        
    }

    public function update(PostFormRequest $request, $post_id){
        $data = $request->validated();

        $post = Post::where('id', $post_id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'img_src' => $data['img_src']
        ]);

        return redirect('/my-posts')->with('message', 'Post Updated Successfully');
    }

    public function destroy($post_id){
        
        $post = Post::find($post_id);
        
        if ($post->user_id !== Auth::user()->id){
            return redirect('/');
        }
        else {
            $post = Post::find($post_id)->delete();
            return redirect('/my-posts')->with('message', 'Post Deleted Successfully');
        }
        


    }
}
