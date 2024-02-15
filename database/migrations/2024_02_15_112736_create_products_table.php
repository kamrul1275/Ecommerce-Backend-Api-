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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('set null')->onUpdate('cascade');

            $table->string('product_name');
            $table->string('product_slug')->nullable();
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->text('short_descp');
            $table->text('long_descp');
            $table->string('product_thambnail')->nullable();
     
            $table->integer('status')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
