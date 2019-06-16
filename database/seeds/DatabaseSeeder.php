<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //テスト用
//        $this->call(ComediansTableSeeder::class);

        $this->call(ItemsTableSeeder::class);
    }
}
