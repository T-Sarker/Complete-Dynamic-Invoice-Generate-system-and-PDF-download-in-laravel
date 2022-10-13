<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartParts extends Model
{
    use HasFactory;
    protected $fillable = ['cartId','name','company','price','quantity','status'];
}
