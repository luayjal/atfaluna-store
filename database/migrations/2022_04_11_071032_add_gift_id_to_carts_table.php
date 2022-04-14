<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGiftIdToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {

            $table->foreignId('gift_id')->constrained('coupons')->nullable()->cascadeOnDelete();

            /*   $table->integer('gift_id')->unsigned();
                $table->index('gift_id');
                $table->foreign('gift_id')->references('id')->on('coupons')->onDelete('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign('gift_id');
        });
    }
}
