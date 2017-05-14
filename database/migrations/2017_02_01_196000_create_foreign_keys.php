<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('icons', function ($table) {
            $table->foreign('lang_id')
            ->references('id')->on('langs')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->engine = 'InnoDB';
        });

        // Schema::table('orders', function ($table) {
        //     $table->foreign('user_id')
        //     ->references('id')->on('users')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');
        // });

        Schema::table('slideshow', function ($table)
        {
            $table->foreign('lang_id')
            ->references('id')->on('langs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icons', function (Blueprint $table) {
            $table->dropForeign('icons_lang_id_foreign');
        }); 
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_user_id_foreign');
        });
        Schema::table('slideshow', function (Blueprint $table) {
            $table->dropForeign('slideshow_lang_id_foreign');
        });
    }
}


