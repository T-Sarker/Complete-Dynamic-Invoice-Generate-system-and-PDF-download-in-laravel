<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','phone','cart'];

    public function getCarts()
    {
        return $this->hasMany(Cart::class,'companyId','id');
    }
}
