<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    public function items()
    {
        return $this->belongsToMany(Item::class, 'special_offer_items', 'special_offer_id', 'item_id');
    }
}
