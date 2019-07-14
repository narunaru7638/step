<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildstepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $steps = DB::table('steps')->get(); // ★

        foreach( $steps as $step ){

            foreach( range(1,3) as $num) {
                DB::table('childsteps')->insert([
                    'step_id' => $step->id,
                    'title' => $step->title."STEP {$num}",
                    'content' => "サンプルコンテント",
                    'number_of_step' => $num,
                    'time_required' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
