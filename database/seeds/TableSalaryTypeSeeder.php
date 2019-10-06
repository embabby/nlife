<?php

use Illuminate\Database\Seeder;

class TableSalaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SalaryType::create([
            'name'=>'Monthly'
        ]);
        \App\SalaryType::create([
            'name'=>'In Hour'
        ]);
        \App\SalaryType::create([
            'name'=>'Yearly'
        ]);
    }
}
