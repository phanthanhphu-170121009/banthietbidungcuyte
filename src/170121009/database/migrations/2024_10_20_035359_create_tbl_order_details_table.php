<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_order_detailts', function (Blueprint $table) {
            $table->bigIncrements('order_detailts_id');
            $table->Integer('order_id');
            $table->Integer('product_id');
            $table->string('product_name');
            $table->Double('product_price');
            $table->Double('product_sales_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_order_detailts');
    }
};