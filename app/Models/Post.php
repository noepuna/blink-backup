<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'img_src'];

    /**
     * Get the user that owns the post.
     */
    public function post()
    {
        return $this->belongsTo(User::class);
    }
}
