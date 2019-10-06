<?php

use Illuminate\Database\Seeder;

class TableCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country=[
            'Egypt',
            'United States',
            'Saudi Arabia',
        ];
        for ($i=0;$i<count($country);$i++){
            \App\Country::create([
                'name'=>$country[$i]
            ]);
        }

    }
}
