<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url', 'item_id'];

    // Define the relationship with the Item model
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
