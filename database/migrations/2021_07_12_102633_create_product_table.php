<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->cascadeOnDelete();
            $table->string('name', 100);
            $table->text('description');
            $table->unsignedInteger('price');
            $table->unsignedInteger('discount')->nullable();
            $table->unsignedFloat('weight');
            $table->unsignedInteger('stock');
            $table->text('pict');
            $table->string('meta_desc');
            $table->string('slug', 100)->unique();
            $table->string('key')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->boolean('is_best')->nullable();
            $table->boolean('is_promo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
