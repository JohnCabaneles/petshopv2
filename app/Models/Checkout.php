<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cartItems()
    {
        return $this->belongsTo(ProductCart::class, 'product_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
