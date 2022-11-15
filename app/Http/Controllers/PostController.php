<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Rating;
use App\Models\Order;
use App\Models\FavouritedItem;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Auth;

class PostController extends Controller
{
    //

    // return create view
    public function home(){
        $posts = Post::where('featured', 1)->get();
        return view('welcome', compact('posts'));
    }
    
    // return create view
    public function create(){
        return view('posts.create');
    }

    // create the post with user's input
    public function store(PostFormRequest $request){
        
        $data = $request->validated();

        $post = Post::create([
            'title'=>$data['title'],
            'medium'=>$data['medium'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'img_src'=>$data['img_src'],
            'user_id'=>Auth::user()->id,
            'amount_rated' => 0,
            'avg_rating'=>0,
            'featured'=>0
        ]);
        return redirect('/create-post')->with('message', 'Post created Successfully');
    }

    
    // get user input, do search query, pass the search and queried posts to posts.search view
    public function dosearch(Request $request){
        
        $search = $request->get('search');
        $posts = Post::where('title', 'like', '%'.$search.'%')->paginate(30);
        //return redirect('search/'.$search)->with( ['search' => $search,'searchposts' => $posts] );
        return view('posts.search', compact('search', 'posts'));
    }
    
    // return all posts to allposts view 
    public function allposts(){
        $posts = Post::paginate(8);

        
        return view('posts.allposts', compact('posts'));
    }

    // gets all posts and passes it to the edit featured screen. For ADMINS only.
    public function getallposts(){
        if(Auth::user()->role == 0){
            return redirect('/');
        }else {
        
            $posts = Post::all();            
            return view('posts.editfeatured', compact('posts'));
        }
    }

    // reassign featured posts
    public function newfeatures(Request $request){
        $checkboxes = $request->get('checkfeature', []);
        foreach($checkboxes as $checkbox){
            // ($checkbox == "checked")
            if($checkbox != null){
                Post::where('id', $checkbox)->update(['featured' => 1]);
            }else {
                Post::where('id', $checkbox)->update(['featured' => 0]);
            }
        }
        return redirect('/dashboard');
        
    }
    


    // return user's post to mypost view blade
    public function myposts(){
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.myposts', compact('posts'));
    }

    // get a specific post
    public function getpost($post_id){
        $post = Post::find($post_id);
        
        $favourited = false;
        
        if (Auth::user() !== null){
            $favourites = Auth::user()->favourites;
            $posts = array();

            foreach ($favourites as $favourite){
                array_push($posts, $favourite->post);
            }

            foreach ($posts as $p){
                if ($p->id == $post_id){
                    $favourited = true;
                }
            }
        }

        return view('posts.viewpost', compact('post', 'favourited'));
    }

    // make a sale
    public function makeAnOrder($post_id){
        $post = Post::find($post_id);
        $seller = Post::find($post_id)->user;
        
        $order = Order::create([
            'post_id' => $post_id,
            'seller_id' => $seller->id,
            'buyer_id' => Auth::user()->id,
            'price' => $post->price
        ]);
        return redirect('/');
    }

    // add post to favourites
    public function addFavourite($post_id){
        $post = Post::find($post_id);
        $user = Auth::user();
        
        $favourite = FavouritedItem::create([
            'post_id' => $post_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('specificpost', ['postid' => $post_id]);
    }

    
    // get favourited item to delete
    public function getFavToDelete($post_id){
        $post = Post::find($post_id);
        $user = Auth::user();
        
        $favourite = Auth::user()->favourites()->where('post_id', $post_id)->get();
        return $this->removeFavourite($favourite, $post_id);
    }
    
    // remove post to favourites
    public function removeFavourite($favourite, $post_id){
        
        $favourite->each->delete();

        return redirect()->route('specificpost', ['postid' => $post_id]);
    }

    // return user's post to mypost view blade
    public function getfavourites(){

        $favourites = Auth::user()->favourites;
        $posts = array();

        foreach ($favourites as $favourite){
            array_push($posts, $favourite->post);
        }

        return view('posts.myfavourites', compact('posts'));
    }

    // public function UserAndPostReports(){
    //     $users = User::all();
    //     $post::all();

    //     return the admin reports screen (will have all the reports on one page for now)
    // }


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
            Rating::where('post_id', $post_id)->delete();
            $post = Post::find($post_id)->delete();
            return redirect('/my-posts')->with('message', 'Post Deleted Successfully');
        }
        


    }

    
}
