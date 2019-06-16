<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildstepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childsteps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('content', 255);
            $table->integer('step_id')->unsigned();
            $table->integer('number_of_step');
            $table->integer('time_required')->nullable();;
            $table->string('pic_img', 255)->nullable();;
            $table->boolean('delete_flg')->default(0);
            $table->timestamps();

            //外部キーを設定する
            $table->foreign('step_id')->references('id')->on('steps');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('childsteps');
    }
}
