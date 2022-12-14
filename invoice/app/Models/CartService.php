<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartService extends Model
{
    use HasFactory;
    protected $fillable = ['cartId','service','price','status'];
}
