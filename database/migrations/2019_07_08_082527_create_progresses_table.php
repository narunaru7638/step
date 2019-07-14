<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('challenge_id')->unsigned();
            $table->integer('childstep_id')->unsigned();

            $table->integer('percentage_achievement')->default(0);
            $table->integer('total_working_time')->default(0);
            $table->boolean('input_possible_flg')->default(0);
            $table->boolean('complete_flg')->default(0);
            $table->boolean('delete_flg')->default(0);
            $table->timestamps();

            //外部キーを設定する
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->foreign('childstep_id')->references('id')->on('childsteps');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progresses');
    }
}
