<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $names = ['山田たろう', '鈴木はなこ'];
        $emails = ['testmailnaru8@gmail.com', 'narumiya4313646@gmail.com'];

        foreach ($names as $key=>$name){

            DB::table('users')->insert([
                'name' => $name,
                'email' => $emails[$key],
                'password' => bcrypt('12341234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
