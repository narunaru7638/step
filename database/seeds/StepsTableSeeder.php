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

        $titles = ['サンプルStep1', 'サンプルStep2', 'サンプルStep3', 'サンプルStep4', 'サンプルStep5', 'サンプルStep6', 'サンプルStep7', 'サンプルStep8', 'サンプルStep9', 'サンプルStep10', 'サンプルStep11'];

        foreach ($categories as $category){
            foreach($titles as $title){
                DB::table('steps')->insert([
                    'title' => $category->name.$title,
                    'content' => $category->name.'testcontent',
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
