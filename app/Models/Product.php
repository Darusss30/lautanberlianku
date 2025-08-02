<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
    	return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }

    // Scope untuk mengambil produk vehicle berdasarkan category_name
    public function scopeVehicles($query)
    {
        return $query->whereHas('category', function($q) {
            $q->where('category_name', 'Vehicle');
        });
    }

    // Scope untuk mengambil produk sparepart berdasarkan category_name
    public function scopeSpareparts($query)
    {
        return $query->whereHas('category', function($q) {
            $q->where('category_name', 'Sparepart');
        });
    }
}
