<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShopIdInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->nullable();
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->nullable();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('shop_id');
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('shop_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('shop_id');
        });

    }
}
