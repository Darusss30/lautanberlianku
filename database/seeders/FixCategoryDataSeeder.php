<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;

class FixCategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua data kategori lama
        Category::truncate();
        SubCategory::truncate();

        // Buat kategori utama: Vehicle dan Sparepart
        $vehicleCategory = Category::create([
            'category_name' => 'Vehicle',
            'category_slug' => 'vehicle',
            'category_icon' => 'fa-car'
        ]);

        $sparepartCategory = Category::create([
            'category_name' => 'Sparepart',
            'category_slug' => 'sparepart',
            'category_icon' => 'fa-cogs'
        ]);

        // Buat sub kategori untuk Vehicle
        $vehicleSubCategories = [
            'Kendaraan Penumpang',
            'Kendaraan Niaga Ringan',
            'Kendaraan Niaga'
        ];

        foreach ($vehicleSubCategories as $subCat) {
            SubCategory::create([
                'category_id' => $vehicleCategory->id,
                'subcategory_name' => $subCat,
                'subcategory_slug' => strtolower(str_replace(' ', '-', $subCat))
            ]);
        }

        // Buat sub kategori untuk Sparepart
        $sparepartSubCategories = [
            'Interior',
            'Body Kit',
            'Part Engine',
            'Tires',
            'Oil',
            'Part Lawas'
        ];

        foreach ($sparepartSubCategories as $subCat) {
            SubCategory::create([
                'category_id' => $sparepartCategory->id,
                'subcategory_name' => $subCat,
                'subcategory_slug' => strtolower(str_replace(' ', '-', $subCat))
            ]);
        }
    }
}
