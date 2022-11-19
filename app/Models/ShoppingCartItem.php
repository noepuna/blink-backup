<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'post_id'];
    
    /**
     * Get the user for the user.
     */
    public function shoppingCart()
    {
        return $this->belongsTo(shoppingCart::class);
    }

    /**
     * Get the user for the user.
     */
    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
