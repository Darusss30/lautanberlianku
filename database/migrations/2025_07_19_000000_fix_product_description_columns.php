<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixProductDescriptionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Change product_short_desc to text to allow longer descriptions
            $table->text('product_short_desc')->change();
            
            // Change product_long_desc to longText to allow very long descriptions
            $table->longText('product_long_desc')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Revert back to string (this might cause data loss if descriptions are too long)
            $table->string('product_short_desc')->change();
            $table->string('product_long_desc')->change();
        });
    }
}
