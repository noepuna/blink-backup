<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'medium', 'price', 'img_src', 'user_id', 'avg_rating', 'amount_rated', 'featured', 'purchased'];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the users who contributed to the rating.
     */
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function favourites()
    {
        return $this->hasMany(FavouritedItem::class);
    }

    /**
     * Get the posts for the user.
     */
    public function shoppingCarts()
    {
        return $this->hasMany(shoppingCarts::class);
    }
}
