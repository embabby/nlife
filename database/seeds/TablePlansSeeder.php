<?php

use Illuminate\Database\Seeder;

class TablePlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Plan::create([
            'name'=>'Bronze',
            'image'=>'bronze.png',
            'job_posts'=>'3',
            'cvs'=>'50',
            'profiles'=>'60',
            'expiry_days'=>'60',
        ]);
        \App\Plan::create([
            'name'=>'Silver',
            'image'=>'silver.png',
            'job_posts'=>'5',
            'cvs'=>'100',
            'profiles'=>'150',
            'expiry_days'=>'90',
        ]);
        \App\Plan::create([
            'name'=>'Gold',
            'image'=>'gold.png',
            'job_posts'=>'10',
            'cvs'=>'300',
            'profiles'=>'400',
            'expiry_days'=>'120',
        ]);
    }
}
