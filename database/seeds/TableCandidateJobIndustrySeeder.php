<?php

use Illuminate\Database\Seeder;

class TableCandidateJobIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CandidateJobIndustry::create([
            'candidate_id'=>'1',
            'job_industry_id'=>1,
        ]);
        \App\CandidateJobIndustry::create([
            'candidate_id'=>'1',
            'job_industry_id'=>2,
        ]);
        \App\CandidateJobIndustry::create([
            'candidate_id'=>'1',
            'job_industry_id'=>3,
        ]);
    }
}
