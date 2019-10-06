<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PartnerSeeder::class);
         $this->call(TableJobIndustrySeeder::class);
         $this->call(TableCareerLevelSeeder::class);
         $this->call(TableJobTypeSeeder::class);
         $this->call(TableJobIndustryTagSeeder::class);
         $this->call(TableCandidateJobIndustrySeeder::class);
         $this->call(TableCountrySeeder::class);
         $this->call(TableCitySeeder::class);
         $this->call(TableLanguageSeeder::class);
         $this->call(TableMiltaryStatausesSeeder::class);
         $this->call(TableMartialStatausesSeeder::class);
         $this->call(TableGenderSeeder::class);
         $this->call(TableCompanySizesSeeder::class);
         $this->call(TableCompanyTypesSeeder::class);
         $this->call(TableBenefitCategoriesSeeder::class);
         $this->call(TableBenefitSeeder::class);
         $this->call(TablePlansSeeder::class);
         $this->call(TableTrailPlanSeeder::class);
         $this->call(TableSalaryTypeSeeder::class);
         $this->call(TableCurrenciesSeeder::class);
         $this->call(TableExperienceYearsSeeder::class);
         $this->call(TableBlogSeeder::class);
         $this->call(TableOpenForJobsStatusesSeeder::class);

    }
}
