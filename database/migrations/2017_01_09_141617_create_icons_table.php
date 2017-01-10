<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('icon_category')->default(0);
            $table->string('path');
            $table->boolean('discount')->default(0);
            $table->boolean('availability')->default(0);
            $table->boolean('novelty')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('slideshow', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('path');
            $table->boolean('active')->default(0);
            $table->timestamps();

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
        Schema::drop('icons');
        Schema::drop('slideshow');
    }
}
