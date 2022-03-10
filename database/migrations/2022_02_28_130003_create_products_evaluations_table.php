<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->constrained('orders')->cascadeOnDelete();
            $table->integer('product_id')->constrained('products')->cascadeOnDelete();
            $table->integer('eval')->nullable();
            $table->string('review')->nullable();
            $table->enum('status',['pending','active'])->default('pending');

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
        Schema::dropIfExists('products_evaluations');
    }
}
