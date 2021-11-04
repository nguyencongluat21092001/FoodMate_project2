<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{
    use HasFactory;

    protected $table = 'restaurant_images';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function restaurantImage(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

}
