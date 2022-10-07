<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'rated'];
    
    /**
     * Get the post the rating belongs to.
     */
    public function post()
    {
        return $this->hasOne(Post::class);
    }
    
    /**
     * Get the users who contributed to the rating.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
