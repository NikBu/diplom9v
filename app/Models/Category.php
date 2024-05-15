<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    
    use NodeTrait;

    protected $fillable = ['name', 'description'];

    // Define the relationship with items
    public function items()
    {
        return $this->belongsToMany(Item::class, 'category_item', 'category_id', 'item_id');
    }
}
