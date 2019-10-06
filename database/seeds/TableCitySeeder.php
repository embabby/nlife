<?php

use Illuminate\Database\Seeder;

class TableCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $egypt=[
            'cairo',
            'Alexandria',
            'Aswan'
        ];
        $usa=[
            'Washington',
            'NYC',
            'Texas'
        ];
         $sa=[
            'ghada',
            'dmamm',
            'mecca'
        ];
         for ($i=0;$i<count($egypt);$i++){
             \App\City::create([
                 'country_id'=>'1',
                 'name'=>$egypt[$i]
             ]);
         }
          for ($i=0;$i<count($usa);$i++){
             \App\City::create([
                 'country_id'=>'2',
                 'name'=>$usa[$i]
             ]);
         }
        for ($i=0;$i<count($sa);$i++){
            \App\City::create([
                'country_id'=>'3',
                'name'=>$sa[$i]
            ]);
        }





    }
}
