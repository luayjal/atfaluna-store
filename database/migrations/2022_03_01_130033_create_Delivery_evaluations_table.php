<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->constrained('orders')->cascadeOnDelete();
            $table->integer('delivery_id')->constrained('delivery_agents')->cascadeOnDelete();
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
        Schema::dropIfExists('delivery_evaluations');
    }
}
