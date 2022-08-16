<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    
    protected $guarded = [];

    public static function boot(){
        parent::boot();

        self::creating(function ($product){
            $product->category()->associate(request()->category);
        });

        self::updating(function ($product){
            $product->category()->associate(request()->category);
        });
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
