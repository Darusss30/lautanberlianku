<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class FixProductDataSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        // Ambil kategori Vehicle dan Sparepart
        $vehicleCategory = Category::where('category_name', 'Vehicle')->first();
        $sparepartCategory = Category::where('category_name', 'Sparepart')->first();
        
        // Ambil sub kategori
        $kendaraanPenumpang = SubCategory::where('subcategory_name', 'Kendaraan Penumpang')->first();
        $interior = SubCategory::where('subcategory_name', 'Interior')->first();
        $partEngine = SubCategory::where('subcategory_name', 'Part Engine')->first();
        $oil = SubCategory::where('subcategory_name', 'Oil')->first();
        
        // Update produk berdasarkan nama produk
        $vehicleProducts = [
            'NEW XPANDER 1.5L SPORT CVT 4X2 AT',
            'NEW XPANDER',
            'NEW XPANDER CROSS', 
            'NEW PAJERO SPORT',
            'CANTER'
        ];
        
        $sparepartProducts = [
            'Switch Diff Lock',
            'Motor Wiper',
            'Air Cleaner L300 Euro 4',
            'Oil Filter L300 Euro 4',
            'Dashboard Cover Xpander'
        ];
        
        // Update vehicle products
        foreach($vehicleProducts as $productName) {
            Product::where('product_name', 'LIKE', '%' . $productName . '%')
                   ->update([
                       'category_id' => $vehicleCategory->id,
                       'subcategory_id' => $kendaraanPenumpang->id
                   ]);
        }
        
        // Update sparepart products
        Product::where('product_name', 'LIKE', '%Switch%')
               ->orWhere('product_name', 'LIKE', '%Motor Wiper%')
               ->update([
                   'category_id' => $sparepartCategory->id,
                   'subcategory_id' => $partEngine->id
               ]);
               
        Product::where('product_name', 'LIKE', '%Air Cleaner%')
               ->update([
                   'category_id' => $sparepartCategory->id,
                   'subcategory_id' => $partEngine->id
               ]);
               
        Product::where('product_name', 'LIKE', '%Oil Filter%')
               ->update([
                   'category_id' => $sparepartCategory->id,
                   'subcategory_id' => $oil->id
               ]);
               
        Product::where('product_name', 'LIKE', '%Dashboard Cover%')
               ->update([
                   'category_id' => $sparepartCategory->id,
                   'subcategory_id' => $interior->id
               ]);
    }
}
