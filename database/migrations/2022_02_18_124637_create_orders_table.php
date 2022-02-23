<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->enum('payment_status',['paid','unpaid']);
            $table->string('transaction_id');
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('delivery_id')->nullable()->constrained('delivery_agents');
            $table->double('subtotal')->nullable();
            $table->double('shipping_price')->nullable();
            $table->double('grandtotal')->nullable();
            $table->double('total_discount')->nullable();

            $table->enum('status',['pending','preparing','in_route','canceled','refound','completed'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}