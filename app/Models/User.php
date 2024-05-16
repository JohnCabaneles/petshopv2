<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function products() : HasOne
    {
        return $this->HasOne(Product::class, 'user_id');
    }

    public function category(): HasOne
    {
       return $this->HasOne(Category::class, 'user_id');
    }

    public function checkout() {
        return $this->hasOne(Checkout::class, 'user_id');
    }

    public function complain() {
        return $this->hasOne(Complain::class, 'user_id');
    }
}

