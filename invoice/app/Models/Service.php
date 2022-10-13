<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','slug','category','status'];

    public function getCategory()
    {
         return $this->hasOne(Category::class, 'id', 'category');
    }
}
