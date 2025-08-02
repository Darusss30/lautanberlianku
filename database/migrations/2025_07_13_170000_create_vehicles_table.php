<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('vehicle_category_id');
            $table->string('vehicle_name');
            $table->string('vehicle_slug');
            $table->string('vehicle_code')->unique();
            $table->integer('vehicle_qty')->default(0);
            $table->string('vehicle_weight')->nullable();
            $table->text('vehicle_tags')->nullable();
            $table->integer('vehicle_seat')->nullable();
            $table->text('vehicle_color')->nullable();
            $table->decimal('vehicle_price', 15, 2);
            $table->decimal('vehicle_discount', 15, 2)->nullable();
            $table->text('vehicle_short_desc')->nullable();
            $table->longText('vehicle_long_desc')->nullable();
            $table->string('vehicle_thumbnail')->nullable();
            $table->string('transmission_type')->default('Manual'); // Manual, Automatic, CVT
            $table->string('fuel_type')->default('Bensin'); // Bensin, Solar, Hybrid
            $table->string('engine_capacity')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('new_vehicle')->default(0);
            $table->tinyInteger('best_seller')->default(0);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
