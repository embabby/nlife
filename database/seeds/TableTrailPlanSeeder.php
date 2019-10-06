<?php

use Illuminate\Database\Seeder;

class TableTrailPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TrailPlan::create([
            'name'=>'Trail Account',
            'image'=>'gold.png',
            'job_posts'=>'1',
            'cvs'=>'3',
            'profiles'=>'5',
            'expiry_days'=>'12',
        ]);
    }
}
