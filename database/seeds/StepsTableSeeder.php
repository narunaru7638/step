<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $titles = ['プライベート', '仕事', '旅行'];

        foreach($titles as $title){
            DB::table('steps')->insert([
                'title' => $title,
                'content' => 'testcontent',
                'user_id' => $user->id,
                'category_id' => 1,
                'pic_img' => '1234',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }
    }
}
