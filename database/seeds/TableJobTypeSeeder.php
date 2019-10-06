<?php

use Illuminate\Database\Seeder;

class TableJobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $job_types=array('Internship','Volunteer','Part Time','Full Time','Remote','Freelancing');
        for ($i=0; $i<count($job_types); $i++){
            \App\JobType::create([
                'name'=>$job_types[$i]
            ]);
        }
    }
}
