<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasTable('products')) {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->foreignId('cat_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->double('price');
            $table->timestamps();
        });
    }
}
// public function up(): void
//     {
//         Schema::create('products', function (Blueprint $table) {
//             $table->id();
//             $table->string('productname');
//             $table->unsignedInteger('cat_id');
//             $table->unsignedInteger('brand_id');
//             $table->double('price', 8, 2);
            
//             $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
//             $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
//             $table->timestamps();
//         });
//     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
