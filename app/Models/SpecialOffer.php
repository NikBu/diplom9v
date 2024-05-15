<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('discount_amount');
    }
}
