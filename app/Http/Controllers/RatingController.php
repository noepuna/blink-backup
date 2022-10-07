<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Auth;

class RatingController extends Controller
{
    
    public function rate($post_id, $rate_input){
        $user_id = Auth::user()->id;

        $r = Rating::where('user_id', '=', $user_id);
        if ($r === null) {
            $rating = Rating::create([
                'post_id'=>$post_id,
                'user_id'=>$user_id,
                'rated'=>$rate_input
            ]);

            $post = Post::find($post_id);
            $post->amount_rated++;

        }
        
    }

    public function rate2(Request $request, $post_id){
        
        $rate_input = $request->get('rate_input');

        $user_id = Auth::user()->id;

        // look for rating that was made by the current user for this current post
        //$r = Rating::where('user_id', '=', $user_id)->where('post_id', '=', $post_id);
        // if rating does not exist, create that rating
        //if ($r === null) {
            $rating = Rating::create([
                'post_id'=>$post_id,
                'user_id'=>$user_id,
                'rated'=>$rate_input
            ]);
            
            $ratings = Rating::where('post_id', $post_id)->get();
            $total = 0;

            foreach ($ratings as $r){
                $total += $r->rated;
            }

            // increment the amount of times this post has been rated
            Post::find($post_id)->increment('amount_rated');
            // the current post
            $post = Post::find($post_id);
            $avg = $total/$post->amount_rated;
            Post::find($post_id)->update(['avg_rating' => $avg]);

        //} 
        //else {
          //  Rating::where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->update(['rated' => $rate_input]);
        //}

        //return view('posts.search2', compact('rate_input', 'avg', 'total'));
        return redirect()->route('specificpost', ['postid' => $post_id])->with('message', 'Rating Submitted Successfully');

    }
}
