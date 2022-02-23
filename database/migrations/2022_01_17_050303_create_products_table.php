<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories','id')->nullOnDelete();
            $table->text('description')->nullable();
            $table->text('description_size')->nullable();
            $table->string('image')->nullable();
            $table->string('certificate')->nullable();
            $table->unsignedFloat('price')->default(0);
            $table->unsignedFloat('discount_price')->default(0);
            $table->unsignedInteger('quantity')->default(0);
            $table->enum('status',['in-stock','sold-out','draft']);
            $table->unsignedBigInteger('sales')->default(0);
            $table->float('rating')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
