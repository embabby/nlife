<?php

use Illuminate\Database\Seeder;

class TableJobIndustryTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\JobIndustryTag::create([
            'job_industry_id'=>1,
            'name'=>'Tag1'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>1,
            'name'=>'Tag2'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>1,
            'name'=>'Tag3'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>2,
            'name'=>'Tag4'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>2,
            'name'=>'Tag5'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>3,
            'name'=>'Tag6'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>4,
            'name'=>'Tag7'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>5,
            'name'=>'Tag8'
        ]);
        \App\JobIndustryTag::create([
            'job_industry_id'=>6,
            'name'=>'Tag9'
        ]);
    }
}
