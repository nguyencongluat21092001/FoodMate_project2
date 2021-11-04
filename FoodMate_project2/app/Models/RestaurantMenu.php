<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    use HasFactory;

    protected $table = 'restaurant_menu';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
}
