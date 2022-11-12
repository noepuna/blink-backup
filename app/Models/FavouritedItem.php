<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouritedItem extends Model
{
    use HasFactory;

    protected $fillable = ["post_id", "user_id"];

    public function post() // this should be singular, the naming of a belngs_to method is important as Laravel will do some of the work for you if let it
    {
        return $this->belongsTo(Post::class); // by naming the method 'post' you no longer need to specify the id, Laravel will automatically know from the method name and just adding '_id' to it.
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
