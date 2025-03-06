<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'category_id'];

    // Define the relationship with the Category Model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
