<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'price'];

    // Define the relationship with the Images model
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    public function firstImage()
    {
        return $this->images()->first();
    }

    // Define the relationship with the Category model
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_item', 'item_id', 'category_id');
    }
}
