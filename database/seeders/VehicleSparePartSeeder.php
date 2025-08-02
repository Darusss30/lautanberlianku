<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class VehicleSparePartSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        // Create Brand first
        $mitsubishi = Brand::create([
            'brand_name' => 'Mitsubishi',
            'brand_slug' => 'mitsubishi',
            'brand_image' => 'upload/brand/mitsubishi.jpg'
        ]);

        // Create Vehicle Categories
        $vehicleCategories = [
            [
                'category_name' => 'Kendaraan Penumpang',
                'category_slug' => 'kendaraan-penumpang',
                'category_icon' => 'fa-car',
                'category_type' => 'vehicle'
            ],
            [
                'category_name' => 'Kendaraan Niaga Ringan',
                'category_slug' => 'kendaraan-niaga-ringan',
                'category_icon' => 'fa-truck',
                'category_type' => 'vehicle'
            ],
            [
                'category_name' => 'Kendaraan Niaga',
                'category_slug' => 'kendaraan-niaga',
                'category_icon' => 'fa-bus',
                'category_type' => 'vehicle'
            ]
        ];

        foreach ($vehicleCategories as $category) {
            Category::create($category);
        }

        // Create Sparepart Categories
        $sparepartCategories = [
            [
                'category_name' => 'Interior',
                'category_slug' => 'interior',
                'category_icon' => 'fa-car',
                'category_type' => 'sparepart'
            ],
            [
                'category_name' => 'Body Kit',
                'category_slug' => 'body-kit',
                'category_icon' => 'fa-wrench',
                'category_type' => 'sparepart'
            ],
            [
                'category_name' => 'Part Engine',
                'category_slug' => 'part-engine',
                'category_icon' => 'fa-cogs',
                'category_type' => 'sparepart'
            ],
            [
                'category_name' => 'Tires',
                'category_slug' => 'tires',
                'category_icon' => 'fa-circle-o',
                'category_type' => 'sparepart'
            ],
            [
                'category_name' => 'Oil',
                'category_slug' => 'oil',
                'category_icon' => 'fa-tint',
                'category_type' => 'sparepart'
            ],
            [
                'category_name' => 'Part Lawas',
                'category_slug' => 'part-lawas',
                'category_icon' => 'fa-gear',
                'category_type' => 'sparepart'
            ]
        ];

        foreach ($sparepartCategories as $category) {
            Category::create($category);
        }

        // Get created categories
        $penumpangCategory = Category::where('category_slug', 'kendaraan-penumpang')->first();
        $niagaRinganCategory = Category::where('category_slug', 'kendaraan-niaga-ringan')->first();
        $niagaCategory = Category::where('category_slug', 'kendaraan-niaga')->first();

        $interiorCategory = Category::where('category_slug', 'interior')->first();
        $partEngineCategory = Category::where('category_slug', 'part-engine')->first();
        $oilCategory = Category::where('category_slug', 'oil')->first();

        // Create Vehicle Products
        $vehicleProducts = [
            [
                'brand_id' => $mitsubishi->id,
                'category_id' => $penumpangCategory->id,
                'subcategory_id' => 1,
                'subsubcategory_id' => 1,
                'product_name' => 'NEW XPANDER',
                'product_slug' => 'new-xpander',
                'product_code' => 'VH001',
                'product_qty' => '10',
                'product_weight' => '1200',
                'product_tags' => 'mitsubishi,xpander,penumpang',
                'product_seat' => '7',
                'product_color' => 'Putih,Hitam,Silver',
                'product_price' => '280000000',
                'product_discount' => null,
                'product_short_desc' => 'Kendaraan penumpang 7 seater dengan desain modern',
                'product_long_desc' => 'Mitsubishi Xpander adalah kendaraan penumpang yang ideal untuk keluarga dengan kapasitas 7 penumpang. Dilengkapi dengan fitur-fitur modern dan teknologi terdepan.',
                'product_thambnail' => 'upload/products/xpander.jpg',
                'status' => 1,
                'new_product' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'category_id' => $penumpangCategory->id,
                'subcategory_id' => 1,
                'subsubcategory_id' => 1,
                'product_name' => 'NEW XPANDER CROSS',
                'product_slug' => 'new-xpander-cross',
                'product_code' => 'VH002',
                'product_qty' => '8',
                'product_weight' => '1250',
                'product_tags' => 'mitsubishi,xpander,cross,penumpang',
                'product_seat' => '7',
                'product_color' => 'Putih,Hitam,Merah',
                'product_price' => '320000000',
                'product_discount' => null,
                'product_short_desc' => 'Varian crossover dari Xpander dengan ground clearance tinggi',
                'product_long_desc' => 'Mitsubishi Xpander Cross adalah varian crossover yang menggabungkan kenyamanan MPV dengan kemampuan SUV.',
                'product_thambnail' => 'upload/products/xpander-cross.jpg',
                'status' => 1,
                'new_product' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'category_id' => $penumpangCategory->id,
                'subcategory_id' => 1,
                'subsubcategory_id' => 1,
                'product_name' => 'NEW PAJERO SPORT',
                'product_slug' => 'new-pajero-sport',
                'product_code' => 'VH003',
                'product_qty' => '5',
                'product_weight' => '2100',
                'product_tags' => 'mitsubishi,pajero,sport,suv',
                'product_seat' => '7',
                'product_color' => 'Putih,Hitam,Silver,Coklat',
                'product_price' => '580000000',
                'product_discount' => null,
                'product_short_desc' => 'SUV premium dengan kemampuan off-road terbaik',
                'product_long_desc' => 'Mitsubishi Pajero Sport adalah SUV premium yang menggabungkan kemewahan, kenyamanan, dan kemampuan off-road yang luar biasa.',
                'product_thambnail' => 'upload/products/pajero-sport.jpg',
                'status' => 1,
                'best_seller' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'category_id' => $niagaRinganCategory->id,
                'subcategory_id' => 1,
                'subsubcategory_id' => 1,
                'product_name' => 'CANTER',
                'product_slug' => 'canter',
                'product_code' => 'VH004',
                'product_qty' => '3',
                'product_weight' => '3500',
                'product_tags' => 'mitsubishi,canter,truck,niaga',
                'product_seat' => '3',
                'product_color' => 'Putih,Kuning',
                'product_price' => '450000000',
                'product_discount' => null,
                'product_short_desc' => 'Truk ringan untuk kebutuhan bisnis',
                'product_long_desc' => 'Mitsubishi Canter adalah truk ringan yang ideal untuk kebutuhan bisnis dengan daya angkut optimal dan efisiensi bahan bakar terbaik.',
                'product_thambnail' => 'upload/products/canter.jpg',
                'status' => 1
            ]
        ];

        foreach ($vehicleProducts as $product) {
            Product::create($product);
        }

        // Create Sparepart Products
        $sparepartProducts = [
            [
                'brand_id' => $mitsubishi->id,
                'category_id' => $partEngineCategory->id,
                'subcategory_id' => 1,
                'subsubcategory_id' => 1,
                'product_name' => 'Air Cleaner L300 Euro 4',
                'product_slug' => 'air-cleaner-l300-euro-4',
                'product_code' => 'SP001',
                'product_qty' => '50',
                'product_weight' => '2',
                'product_tags' => 'air cleaner,l300,euro 4,filter',
                'product_seat' => null,
                'product_color' => null,
                'product_price' => '170000',
                'product_discount' => null,
                'product_short_desc' => 'Filter udara untuk L300 Euro 4',
                'product_long_desc' => 'Air Cleaner original untuk Mitsubishi L300 Euro 4. Menjaga kebersihan udara yang masuk ke mesin untuk performa optimal.',
                'product_thambnail' => 'upload/products/air-cleaner-l300.jpg',
                'status' => 1,
                'new_product' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'category_id' => $oilCategory->id,
                'subcategory_id' => 1,
                'subsubcategory_id' => 1,
                'product_name' => 'Oil Filter L300 Euro 4',
                'product_slug' => 'oil-filter-l300-euro-4',
                'product_code' => 'SP002',
                'product_qty' => '75',
                'product_weight' => '1',
                'product_tags' => 'oil filter,l300,euro 4,oli',
                'product_seat' => null,
                'product_color' => null,
                'product_price' => '170000',
                'product_discount' => null,
                'product_short_desc' => 'Filter oli untuk L300 Euro 4',
                'product_long_desc' => 'Oil Filter original untuk Mitsubishi L300 Euro 4. Menyaring kotoran dalam oli mesin untuk menjaga performa dan umur mesin.',
                'product_thambnail' => 'upload/products/oil-filter-l300.jpg',
                'status' => 1,
                'new_product' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'category_id' => $interiorCategory->id,
                'subcategory_id' => 1,
                'subsubcategory_id' => 1,
                'product_name' => 'Dashboard Cover Xpander',
                'product_slug' => 'dashboard-cover-xpander',
                'product_code' => 'SP003',
                'product_qty' => '25',
                'product_weight' => '1',
                'product_tags' => 'dashboard,cover,xpander,interior',
                'product_seat' => null,
                'product_color' => 'Hitam,Coklat',
                'product_price' => '350000',
                'product_discount' => '300000',
                'product_short_desc' => 'Pelindung dashboard untuk Xpander',
                'product_long_desc' => 'Dashboard cover berkualitas tinggi untuk melindungi dashboard Mitsubishi Xpander dari sinar UV dan debu.',
                'product_thambnail' => 'upload/products/dashboard-cover.jpg',
                'status' => 1,
                'product_promo' => 1
            ]
        ];

        foreach ($sparepartProducts as $product) {
            Product::create($product);
        }
    }
}
