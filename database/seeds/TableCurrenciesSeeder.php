<?php

use Illuminate\Database\Seeder;

class TableCurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Currency::create([
            'name'=>'Egyptian Pound',
            'symbol'=>'L.E'
        ]);
        \App\Currency::create([
            'name'=>'Dollar',
            'symbol'=>'$'
        ]);
    }
}
