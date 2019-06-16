<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 100 ; $i++) {

            \App\Item::create([
                'name' => $i .'番目の商品名'
            ]);

        }
    }
}