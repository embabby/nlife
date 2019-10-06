<?php

use Illuminate\Database\Seeder;

class TableCompanyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CompanyType::create([
            'name'=>'Private'
        ]);
        \App\CompanyType::create([
            'name'=>'Charity'
        ]);
        \App\CompanyType::create([
            'name'=>'gov'
        ]);
    }



}
