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
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('lang_id');
            $table->unsignedInteger('gallery_id');
            $table->string('path');
            $table->integer('a3')->comment('Price for a3 format icon');
            $table->integer('a4')->comment('Price for a4 format icon');;
            $table->integer('a5')->comment('Price for a5 format icon');;
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->boolean('available');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->nullable();
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
    }
}


