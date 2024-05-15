<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['item_id', 'customer_id', 'comment', 'rating'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}