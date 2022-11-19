<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id'];
    
    /**
     * Get the user for the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the posts for the user.
     */
    public function items()
    {
        return $this->hasMany(ShoppingCartItem::class);
    }
}
