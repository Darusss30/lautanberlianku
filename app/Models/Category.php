<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug',
        'category_icon',
    ];

    // Relasi ke products
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    // Relasi ke subcategories
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
