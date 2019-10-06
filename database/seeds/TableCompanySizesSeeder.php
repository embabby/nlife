<?php

use Illuminate\Database\Seeder;

class TableCompanySizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CompanySize::create([
            'name'=>'1 to 10 Employee'
        ]);
        \App\CompanySize::create([
            'name'=>'10 to 50 Employee'
        ]);
        \App\CompanySize::create([
            'name'=>'50 to 100 Employee'
        ]);

    }
}
