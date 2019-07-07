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

        $titles = ['サンプルタイトル1', 'サンプルタイトル2', 'サンプルタイトル3', 'サンプルタイトル4', 'サンプルタイトル5', 'サンプルタイトル6', 'サンプルタイトル7', 'サンプルタイトル8', 'サンプルタイトル9', 'サンプルタイトル10', 'サンプルタイトル11'];

        $pic_img_temp = [null, 'business',  'programming', 'diet', 'english', 'sport', 'certification'];

        foreach ($categories as $key=>$category){
            foreach($titles as $title){

                if($pic_img_temp[$key]){
                    $pic_img = $pic_img_temp[$key].rand(1,4).'.jpg';
                }else{
                    $pic_img = null;
};

                DB::table('steps')->insert([
                    'title' => $category->name.$title,
                    'content' => $category->name.'サンプルコンテント',
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'pic_img' => $pic_img,
                ]);
            }
        }
    }
}
