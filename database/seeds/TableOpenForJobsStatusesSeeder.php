<?php

use Illuminate\Database\Seeder;

class TableOpenForJobsStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\OpenForJobStatus::create([
            'name'=>'Currently Looking For Jobs'
        ]);
        \App\OpenForJobStatus::create([
            'name'=>'Does\'t mind For good Opportunities'
        ]);
        \App\OpenForJobStatus::create([
            'name'=>'Not Looking For Jobs'
        ]);
    }
}
