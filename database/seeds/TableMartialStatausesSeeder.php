<?php

use Illuminate\Database\Seeder;

class TableMartialStatausesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $martial=[
            'single',
            'married',
            'divorced',
        ];
        for ($i=0; $i<count($martial); $i++){
            \App\MartialStatus::create([
                'name'=>$martial[$i]
        ]);
        }

    }
}
