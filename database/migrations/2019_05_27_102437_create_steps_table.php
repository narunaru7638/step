<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('content', 255);
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('number_of_challenger')->default(0);
            $table->string('pic_img', 255)->nullable();
            $table->integer('required_time')->nullable();
            $table->boolean('delete_flg')->default(0);
            $table->timestamps();

            //外部キーを設定する
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
}