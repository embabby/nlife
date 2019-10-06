<?php


function sanitize($value){
  return  htmlentities(strip_tags($value));
}

function industry_tags($industry_tag_id){
    $tags=\App\JobIndustryTag::where('job_industry_id',$industry_tag_id)->get();
    return $tags;
}

function gender_image($gender_id){
    if ($gender_id==1){
        return 'candidates/default_male.jpg';
    }else{
        return 'candidates/default_female.jpg';
    }
}

function candidate_job_status($job_id,$candidate_id){


    $job_application=\App\JobApplicant::where('job_id',$job_id)->where('candidate_id',$candidate_id)->first();
    if ($job_application){
        $status_id=$job_application->job_application_status_id;
        if (Config::get('constants.APPLIED')==$status_id){
            return 'Applied';
        }elseif(Config::get('constants.SHORTLISTED')==$status_id){
            return 'Shortlisted';
        }elseif(Config::get('constants.ACCEPTED')==$status_id){
            return 'Accepted';
        }elseif(Config::get('constants.REJECTED')==$status_id){
            return 'Rejected';
        }
    }


}
