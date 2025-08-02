<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('sparepart_category_id');
            $table->string('sparepart_name');
            $table->string('sparepart_slug');
            $table->string('sparepart_code')->unique();
            $table->integer('sparepart_qty')->default(0);
            $table->string('sparepart_weight')->nullable();
            $table->text('sparepart_tags')->nullable();
            $table->text('compatible_vehicles')->nullable();
            $table->decimal('sparepart_price', 15, 2);
            $table->decimal('sparepart_discount', 15, 2)->nullable();
            $table->text('sparepart_short_desc')->nullable();
            $table->longText('sparepart_long_desc')->nullable();
            $table->string('sparepart_thumbnail')->nullable();
            $table->string('part_number')->nullable();
            $table->string('warranty_period')->default('6 months');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('new_sparepart')->default(0);
            $table->tinyInteger('best_seller')->default(0);
            $table->tinyInteger('original_part')->default(1);
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
        Schema::dropIfExists('spareparts');
    }
}
