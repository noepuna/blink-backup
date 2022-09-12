<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the post that was sold.
     */
    public function post()
    {
        return $this->hasOne(Post::class);
    }

    /**
     * Get the user that made the sale.
     */
    public function seller()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that bought the post.
     */
    public function buyer()
    {
        return $this->belongsTo(User::class);
    }
}
