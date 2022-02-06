<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status')->cascadeOnDelete();
            $table->string('invoice');
            $table->string('receipt')->nullable();
            $table->integer('shipping');
            $table->integer('total_price');
            $table->integer('total_weight');
            $table->string('courier', 50);
            $table->string('service', 100);
            $table->string('contact');
            $table->text('note')->nullable();
            $table->text('proof')->nullable();
            $table->timestamps();
            $table->timestamp('due_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
