<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('step_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('complete_flg')->default(0);
            $table->boolean('delete_flg')->default(0);
            $table->timestamps();

            //外部キーを設定する
            $table->foreign('step_id')->references('id')->on('steps');
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
