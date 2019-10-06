<?php

use Illuminate\Database\Seeder;

class TableLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages=[
            'English',
            'Arabic',
            'Swedish',
            'German',
            'Spanish'
        ];

        for ($i=0;$i<count($languages);$i++){
            \App\Language::create([
                'name'=>$languages[$i]
            ]);
        }
    }
}
