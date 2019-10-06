<?php

use Illuminate\Database\Seeder;

class TableJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Job::create([
            'company_id'=>'1',
            'job_title'=>'PHP Developer',
            'country_id'=>'1',
            'city_id'=>'1',
            'address'=>'Zahraa Nasr City',
            'job_type_id'=>'1',
            'career_level_id'=>'1',
            'start_years_of_experience'=>'1',
            'end_years_of_experience'=>'2',
            'years_of_experience_operator'=>'0',
            'vacancies'=>'1',
            'start_salary'=>'500',
            'end_salary'=>'600',
            'salary_type_id'=>'1',
            'currency_id'=>'1',
            'hide_salary'=>'0',
            'job_description'=>'t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma',
            'job_requirements'=>'t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma',
            'hide_company'=>'0',
            'clicks'=>'32',
        ]);
    }
}
