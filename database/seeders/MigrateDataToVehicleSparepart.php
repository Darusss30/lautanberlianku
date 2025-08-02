<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vehicle;
use App\Models\Sparepart;
use App\Models\VehicleCategory;
use App\Models\SparepartCategory;

class MigrateDataToVehicleSparepart extends Seeder
{
    public function run()
    {
        // Step 1: Update categories with category_type
        $this->updateCategories();
        
        // Step 2: Migrate vehicle categories
        $this->migrateVehicleCategories();
        
        // Step 3: Migrate sparepart categories  
        $this->migrateSparepartCategories();
        
        // Step 4: Migrate vehicle products
        $this->migrateVehicleProducts();
        
        // Step 5: Migrate sparepart products
        $this->migrateSparepartProducts();
        
        echo "Data migration completed successfully!\n";
    }
    
    private function updateCategories()
    {
        echo "Updating categories with category_type...\n";
        
        // Vehicle categories
        $vehicleCategories = [
            'Kendaraan Penumpang',
            'Kendaraan Niaga Ringan', 
            'Kendaraan Niaga'
        ];
        
        // Sparepart categories
        $sparepartCategories = [
            'Interior',
            'Body Kit',
            'Part Engine',
            'Tires',
            'Oil',
            'Part Lawas'
        ];
        
        foreach ($vehicleCategories as $categoryName) {
            Category::where('category_name', $categoryName)
                   ->update(['category_type' => 'vehicle']);
        }
        
        foreach ($sparepartCategories as $categoryName) {
            Category::where('category_name', $categoryName)
                   ->update(['category_type' => 'sparepart']);
        }
        
        echo "Categories updated successfully!\n";
    }
    
    private function migrateVehicleCategories()
    {
        echo "Migrating vehicle categories...\n";
        
        $vehicleCategories = Category::where('category_type', 'vehicle')->get();
        
        foreach ($vehicleCategories as $category) {
            VehicleCategory::updateOrCreate(
                ['category_slug' => $category->category_slug],
                [
                    'category_name' => $category->category_name,
                    'category_slug' => $category->category_slug,
                    'category_icon' => $category->category_icon,
                ]
            );
        }
        
        echo "Vehicle categories migrated successfully!\n";
    }
    
    private function migrateSparepartCategories()
    {
        echo "Migrating sparepart categories...\n";
        
        $sparepartCategories = Category::where('category_type', 'sparepart')->get();
        
        foreach ($sparepartCategories as $category) {
            SparepartCategory::updateOrCreate(
                ['category_slug' => $category->category_slug],
                [
                    'category_name' => $category->category_name,
                    'category_slug' => $category->category_slug,
                    'category_icon' => $category->category_icon,
                ]
            );
        }
        
        echo "Sparepart categories migrated successfully!\n";
    }
    
    private function migrateVehicleProducts()
    {
        echo "Migrating vehicle products...\n";
        
        // Vehicle product codes (based on admin panel analysis)
        $vehicleCodes = ['VH001', 'VH002', 'VH003', 'VH004', 'XPANDER134'];
        
        $vehicleProducts = Product::whereIn('product_code', $vehicleCodes)->get();
        
        foreach ($vehicleProducts as $product) {
            // Determine category
            $categoryId = $this->getVehicleCategoryId($product->product_name);
            
            Vehicle::updateOrCreate(
                ['vehicle_code' => $product->product_code],
                [
                    'vehicle_name' => $product->product_name,
                    'vehicle_slug' => $product->product_slug,
                    'vehicle_code' => $product->product_code,
                    'vehicle_qty' => $product->product_qty ?? 1,
                    'vehicle_tags' => $product->product_tags,
                    'vehicle_color' => $product->product_color,
                    'vehicle_price' => $product->product_price ?? 0,
                    'vehicle_discount' => $product->product_discount,
                    'vehicle_short_desc' => $product->product_short_desc,
                    'vehicle_long_desc' => $product->product_long_desc,
                    'vehicle_thumbnail' => $product->product_thambnail,
                    'status' => $product->status,
                    'vehicle_category_id' => $categoryId,
                    'brand_id' => $product->brand_id ?? 1,
                    'new_vehicle' => $product->featured ?? 0,
                    'best_seller' => $product->special_deals ?? 0,
                ]
            );
        }
        
        echo "Vehicle products migrated successfully!\n";
    }
    
    private function migrateSparepartProducts()
    {
        echo "Migrating sparepart products...\n";
        
        // Sparepart product codes (based on admin panel analysis)
        $sparepartCodes = ['SP001', 'SP002', 'SP003', '12345'];
        
        $sparepartProducts = Product::whereIn('product_code', $sparepartCodes)->get();
        
        foreach ($sparepartProducts as $product) {
            // Determine category
            $categoryId = $this->getSparepartCategoryId($product->product_name);
            
            Sparepart::updateOrCreate(
                ['sparepart_code' => $product->product_code],
                [
                    'sparepart_name' => $product->product_name,
                    'sparepart_slug' => $product->product_slug,
                    'sparepart_code' => $product->product_code,
                    'sparepart_qty' => $product->product_qty ?? 1,
                    'sparepart_tags' => $product->product_tags,
                    'sparepart_price' => $product->product_price ?? 0,
                    'sparepart_discount' => $product->product_discount,
                    'sparepart_short_desc' => $product->product_short_desc,
                    'sparepart_long_desc' => $product->product_long_desc,
                    'sparepart_thumbnail' => $product->product_thambnail,
                    'status' => $product->status,
                    'sparepart_category_id' => $categoryId,
                    'brand_id' => $product->brand_id ?? 1,
                    'new_sparepart' => $product->featured ?? 0,
                    'best_seller' => $product->special_deals ?? 0,
                    'original_part' => $this->isOriginalPart($product->product_name) ? 1 : 0,
                ]
            );
        }
        
        echo "Sparepart products migrated successfully!\n";
    }
    
    private function getVehicleCategoryId($productName)
    {
        // Map product names to vehicle categories
        if (str_contains(strtolower($productName), 'xpander') || 
            str_contains(strtolower($productName), 'pajero')) {
            return VehicleCategory::where('category_name', 'Kendaraan Penumpang')->first()->id;
        } elseif (str_contains(strtolower($productName), 'canter')) {
            return VehicleCategory::where('category_name', 'Kendaraan Niaga')->first()->id;
        }
        
        // Default to Kendaraan Penumpang
        return VehicleCategory::where('category_name', 'Kendaraan Penumpang')->first()->id;
    }
    
    private function getSparepartCategoryId($productName)
    {
        // Map product names to sparepart categories
        if (str_contains(strtolower($productName), 'dashboard') || 
            str_contains(strtolower($productName), 'cover')) {
            return SparepartCategory::where('category_name', 'Interior')->first()->id;
        } elseif (str_contains(strtolower($productName), 'oil') || 
                  str_contains(strtolower($productName), 'filter')) {
            return SparepartCategory::where('category_name', 'Oil')->first()->id;
        } elseif (str_contains(strtolower($productName), 'air cleaner')) {
            return SparepartCategory::where('category_name', 'Part Engine')->first()->id;
        } elseif (str_contains(strtolower($productName), 'wiper') || 
                  str_contains(strtolower($productName), 'switch')) {
            return SparepartCategory::where('category_name', 'Part Lawas')->first()->id;
        }
        
        // Default to Part Engine
        return SparepartCategory::where('category_name', 'Part Engine')->first()->id;
    }
    
    private function isOriginalPart($productName)
    {
        // Determine if part is original based on product name or code
        $originalKeywords = ['filter', 'cleaner', 'original', 'oem'];
        
        foreach ($originalKeywords as $keyword) {
            if (str_contains(strtolower($productName), $keyword)) {
                return true;
            }
        }
        
        return false;
    }
}
