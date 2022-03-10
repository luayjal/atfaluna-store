<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->nullable()->cascadeOnDelete()->after('code');
            $table->text('details')->nullable()->after('product_id');
            $table->string('title')->nullable()->after('details');
            $table->string('cover_image')->nullable()->after('title');
            $table->enum('type_table',['coupon','gift'])->default('coupon')->after('cover_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_id');
            $table->dropColumn('title');
            $table->dropColumn('details');
            $table->dropColumn('type_table');
            $table->dropColumn('cover_image');
        });
    }
}
