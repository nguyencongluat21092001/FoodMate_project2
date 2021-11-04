<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
}
