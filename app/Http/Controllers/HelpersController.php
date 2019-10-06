<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpersController extends Controller
{
    public function cities($country_id){
        $cities = DB::table("cities")
            ->where("country_id",$country_id)
            ->pluck("name","id");
        return json_encode($cities);
    }

    public function benefits($benefit_category_id){
        $benefits = DB::table("benefits")
            ->where("benefit_category_id",$benefit_category_id)
            ->pluck("name","id");
        return json_encode($benefits);
    }

    public function job_industry_tags($job_industries){

        $industry_tags = DB::table("job_industry_tags")
            ->whereIn("job_industry_id",array_values(json_decode($job_industries)))
            ->pluck("name","id");
        return json_encode($industry_tags);
    }
}
