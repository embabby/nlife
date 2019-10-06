<?php

use Illuminate\Database\Seeder;

class TableMiltaryStatausesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $martial=[
            'Final Exception',
            'Exception',
            'Finished',
        ];
        for ($i=0; $i<count($martial); $i++){
            \App\MilitaryStatus::create([
                'name'=>$martial[$i]
            ]);
        }

    }
}
