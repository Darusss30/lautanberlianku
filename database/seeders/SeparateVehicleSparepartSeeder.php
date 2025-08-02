<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleCategory;
use App\Models\SparepartCategory;
use App\Models\Vehicle;
use App\Models\Sparepart;
use App\Models\Brand;

class SeparateVehicleSparepartSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        // Create Brand first if not exists
        $mitsubishi = Brand::firstOrCreate([
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
                'category_description' => 'Kendaraan untuk penumpang seperti MPV, SUV, dan sedan',
                'status' => 1
            ],
            [
                'category_name' => 'Kendaraan Niaga Ringan',
                'category_slug' => 'kendaraan-niaga-ringan',
                'category_icon' => 'fa-truck',
                'category_description' => 'Kendaraan niaga ringan untuk bisnis',
                'status' => 1
            ],
            [
                'category_name' => 'Kendaraan Niaga',
                'category_slug' => 'kendaraan-niaga',
                'category_icon' => 'fa-bus',
                'category_description' => 'Kendaraan niaga berat seperti bus dan truk besar',
                'status' => 1
            ]
        ];

        foreach ($vehicleCategories as $category) {
            VehicleCategory::create($category);
        }

        // Create Sparepart Categories
        $sparepartCategories = [
            [
                'category_name' => 'Interior',
                'category_slug' => 'interior',
                'category_icon' => 'fa-car',
                'category_description' => 'Komponen interior kendaraan',
                'status' => 1
            ],
            [
                'category_name' => 'Body Kit',
                'category_slug' => 'body-kit',
                'category_icon' => 'fa-wrench',
                'category_description' => 'Komponen body dan eksterior',
                'status' => 1
            ],
            [
                'category_name' => 'Part Engine',
                'category_slug' => 'part-engine',
                'category_icon' => 'fa-cogs',
                'category_description' => 'Komponen mesin kendaraan',
                'status' => 1
            ],
            [
                'category_name' => 'Tires',
                'category_slug' => 'tires',
                'category_icon' => 'fa-circle-o',
                'category_description' => 'Ban dan velg kendaraan',
                'status' => 1
            ],
            [
                'category_name' => 'Oil',
                'category_slug' => 'oil',
                'category_icon' => 'fa-tint',
                'category_description' => 'Oli dan pelumas kendaraan',
                'status' => 1
            ],
            [
                'category_name' => 'Part Lawas',
                'category_slug' => 'part-lawas',
                'category_icon' => 'fa-gear',
                'category_description' => 'Suku cadang untuk kendaraan lama',
                'status' => 1
            ]
        ];

        foreach ($sparepartCategories as $category) {
            SparepartCategory::create($category);
        }

        // Get created categories
        $penumpangCategory = VehicleCategory::where('category_slug', 'kendaraan-penumpang')->first();
        $niagaRinganCategory = VehicleCategory::where('category_slug', 'kendaraan-niaga-ringan')->first();
        $niagaCategory = VehicleCategory::where('category_slug', 'kendaraan-niaga')->first();

        $interiorCategory = SparepartCategory::where('category_slug', 'interior')->first();
        $partEngineCategory = SparepartCategory::where('category_slug', 'part-engine')->first();
        $oilCategory = SparepartCategory::where('category_slug', 'oil')->first();

        // Create Vehicle Products
        $vehicles = [
            [
                'brand_id' => $mitsubishi->id,
                'vehicle_category_id' => $penumpangCategory->id,
                'vehicle_name' => 'NEW XPANDER',
                'vehicle_slug' => 'new-xpander',
                'vehicle_code' => 'VH001',
                'vehicle_qty' => 10,
                'vehicle_weight' => '1200',
                'vehicle_tags' => ['mitsubishi', 'xpander', 'penumpang'],
                'vehicle_seat' => 7,
                'vehicle_color' => ['Putih', 'Hitam', 'Silver'],
                'vehicle_price' => 280000000,
                'vehicle_discount' => null,
                'vehicle_short_desc' => 'Kendaraan penumpang 7 seater dengan desain modern',
                'vehicle_long_desc' => 'Mitsubishi Xpander adalah kendaraan penumpang yang ideal untuk keluarga dengan kapasitas 7 penumpang. Dilengkapi dengan fitur-fitur modern dan teknologi terdepan.',
                'vehicle_thumbnail' => 'upload/vehicles/xpander.jpg',
                'transmission_type' => 'Manual,Automatic',
                'fuel_type' => 'Bensin',
                'engine_capacity' => '1500cc',
                'status' => 1,
                'new_vehicle' => 1,
                'best_seller' => 0
            ],
            [
                'brand_id' => $mitsubishi->id,
                'vehicle_category_id' => $penumpangCategory->id,
                'vehicle_name' => 'NEW XPANDER CROSS',
                'vehicle_slug' => 'new-xpander-cross',
                'vehicle_code' => 'VH002',
                'vehicle_qty' => 8,
                'vehicle_weight' => '1250',
                'vehicle_tags' => ['mitsubishi', 'xpander', 'cross', 'penumpang'],
                'vehicle_seat' => 7,
                'vehicle_color' => ['Putih', 'Hitam', 'Merah'],
                'vehicle_price' => 320000000,
                'vehicle_discount' => null,
                'vehicle_short_desc' => 'Varian crossover dari Xpander dengan ground clearance tinggi',
                'vehicle_long_desc' => 'Mitsubishi Xpander Cross adalah varian crossover yang menggabungkan kenyamanan MPV dengan kemampuan SUV.',
                'vehicle_thumbnail' => 'upload/vehicles/xpander-cross.jpg',
                'transmission_type' => 'Manual,Automatic',
                'fuel_type' => 'Bensin',
                'engine_capacity' => '1500cc',
                'status' => 1,
                'new_vehicle' => 1,
                'best_seller' => 0
            ],
            [
                'brand_id' => $mitsubishi->id,
                'vehicle_category_id' => $penumpangCategory->id,
                'vehicle_name' => 'NEW PAJERO SPORT',
                'vehicle_slug' => 'new-pajero-sport',
                'vehicle_code' => 'VH003',
                'vehicle_qty' => 5,
                'vehicle_weight' => '2100',
                'vehicle_tags' => ['mitsubishi', 'pajero', 'sport', 'suv'],
                'vehicle_seat' => 7,
                'vehicle_color' => ['Putih', 'Hitam', 'Silver', 'Coklat'],
                'vehicle_price' => 580000000,
                'vehicle_discount' => null,
                'vehicle_short_desc' => 'SUV premium dengan kemampuan off-road terbaik',
                'vehicle_long_desc' => 'Mitsubishi Pajero Sport adalah SUV premium yang menggabungkan kemewahan, kenyamanan, dan kemampuan off-road yang luar biasa.',
                'vehicle_thumbnail' => 'upload/vehicles/pajero-sport.jpg',
                'transmission_type' => 'Manual,Automatic',
                'fuel_type' => 'Solar',
                'engine_capacity' => '2400cc',
                'status' => 1,
                'new_vehicle' => 0,
                'best_seller' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'vehicle_category_id' => $niagaRinganCategory->id,
                'vehicle_name' => 'CANTER',
                'vehicle_slug' => 'canter',
                'vehicle_code' => 'VH004',
                'vehicle_qty' => 3,
                'vehicle_weight' => '3500',
                'vehicle_tags' => ['mitsubishi', 'canter', 'truck', 'niaga'],
                'vehicle_seat' => 3,
                'vehicle_color' => ['Putih', 'Kuning'],
                'vehicle_price' => 450000000,
                'vehicle_discount' => null,
                'vehicle_short_desc' => 'Truk ringan untuk kebutuhan bisnis',
                'vehicle_long_desc' => 'Mitsubishi Canter adalah truk ringan yang ideal untuk kebutuhan bisnis dengan daya angkut optimal dan efisiensi bahan bakar terbaik.',
                'vehicle_thumbnail' => 'upload/vehicles/canter.jpg',
                'transmission_type' => 'Manual',
                'fuel_type' => 'Solar',
                'engine_capacity' => '3000cc',
                'status' => 1,
                'new_vehicle' => 0,
                'best_seller' => 0
            ]
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }

        // Create Sparepart Products
        $spareparts = [
            [
                'brand_id' => $mitsubishi->id,
                'sparepart_category_id' => $partEngineCategory->id,
                'sparepart_name' => 'Air Cleaner L300 Euro 4',
                'sparepart_slug' => 'air-cleaner-l300-euro-4',
                'sparepart_code' => 'SP001',
                'sparepart_qty' => 50,
                'sparepart_weight' => '2',
                'sparepart_tags' => ['air cleaner', 'l300', 'euro 4', 'filter'],
                'compatible_vehicles' => ['L300', 'Canter'],
                'sparepart_price' => 170000,
                'sparepart_discount' => null,
                'sparepart_short_desc' => 'Filter udara untuk L300 Euro 4',
                'sparepart_long_desc' => 'Air Cleaner original untuk Mitsubishi L300 Euro 4. Menjaga kebersihan udara yang masuk ke mesin untuk performa optimal.',
                'sparepart_thumbnail' => 'upload/spareparts/air-cleaner-l300.jpg',
                'part_number' => 'MR968274',
                'warranty_period' => '6 months',
                'status' => 1,
                'new_sparepart' => 1,
                'best_seller' => 0,
                'original_part' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'sparepart_category_id' => $oilCategory->id,
                'sparepart_name' => 'Oil Filter L300 Euro 4',
                'sparepart_slug' => 'oil-filter-l300-euro-4',
                'sparepart_code' => 'SP002',
                'sparepart_qty' => 75,
                'sparepart_weight' => '1',
                'sparepart_tags' => ['oil filter', 'l300', 'euro 4', 'oli'],
                'compatible_vehicles' => ['L300', 'Canter'],
                'sparepart_price' => 170000,
                'sparepart_discount' => null,
                'sparepart_short_desc' => 'Filter oli untuk L300 Euro 4',
                'sparepart_long_desc' => 'Oil Filter original untuk Mitsubishi L300 Euro 4. Menyaring kotoran dalam oli mesin untuk menjaga performa dan umur mesin.',
                'sparepart_thumbnail' => 'upload/spareparts/oil-filter-l300.jpg',
                'part_number' => 'MD360935',
                'warranty_period' => '6 months',
                'status' => 1,
                'new_sparepart' => 1,
                'best_seller' => 0,
                'original_part' => 1
            ],
            [
                'brand_id' => $mitsubishi->id,
                'sparepart_category_id' => $interiorCategory->id,
                'sparepart_name' => 'Dashboard Cover Xpander',
                'sparepart_slug' => 'dashboard-cover-xpander',
                'sparepart_code' => 'SP003',
                'sparepart_qty' => 25,
                'sparepart_weight' => '1',
                'sparepart_tags' => ['dashboard', 'cover', 'xpander', 'interior'],
                'compatible_vehicles' => ['Xpander', 'Xpander Cross'],
                'sparepart_price' => 350000,
                'sparepart_discount' => 300000,
                'sparepart_short_desc' => 'Pelindung dashboard untuk Xpander',
                'sparepart_long_desc' => 'Dashboard cover berkualitas tinggi untuk melindungi dashboard Mitsubishi Xpander dari sinar UV dan debu.',
                'sparepart_thumbnail' => 'upload/spareparts/dashboard-cover.jpg',
                'part_number' => 'XP-DC-001',
                'warranty_period' => '12 months',
                'status' => 1,
                'new_sparepart' => 0,
                'best_seller' => 1,
                'original_part' => 0
            ]
        ];

        foreach ($spareparts as $sparepart) {
            Sparepart::create($sparepart);
        }
    }
}
