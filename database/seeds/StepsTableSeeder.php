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
        $categories = DB::table('categories')->get();


        $titles = ['サンプルStep1', 'サンプルStep2', 'サンプルStep3', 'サンプルStep4', 'サンプルStep5', 'サンプルStep6'];
//        $titles = ['最短で英語ができる方法'];

        foreach ($categories as $category){
            foreach($titles as $title){
                DB::table('steps')->insert([
                    'title' => $title,
                    'content' => 'testcontent',
                    'user_id' => $user->id,
                    'category_id' => $category->id,
//                'pic_img' => null,
//                'required_time' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
