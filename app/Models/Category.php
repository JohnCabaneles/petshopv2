<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user() : BelongsTo
    {
        return $this->BelongsTo(Product::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}
