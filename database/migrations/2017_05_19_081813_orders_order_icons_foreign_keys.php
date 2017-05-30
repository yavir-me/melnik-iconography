<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersOrderIconsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_icons', function ($table) {
            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->engine = 'InnoDB';
        });

        Schema::table('orders_icons', function ($table) {
            $table->foreign('icon_id')
            ->references('id')->on('icons')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_icons', function (Blueprint $table) {
            $table->dropForeign('orders_icons_order_id_foreign');
        });

        Schema::table('orders_icons', function (Blueprint $table) {
            $table->dropForeign('orders_icons_icon_id_foreign');
        });
    }
}
