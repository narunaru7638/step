<?php

use Illuminate\Database\Seeder;

class ComediansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $comedian_names = [
            'ビートたけし',
            'タモリ',
            '明石家さんま',
            'ダウンタウン',
            'ナインティナイン',
            'ロンドンブーツ１号２号',
        ];

        foreach ($comedian_names as $comedian_name) {

            \App\Comedian::create([
                'name' => $comedian_name
            ]);

        }

    }
}
