<?php

namespace App\Http\Controllers\CandidateAuth;

use App\Candidate;
use App\CandidateExperience;
use App\CandidateJobIndustry;
use App\CandidateJobIndustryTag;
use App\CandidateJobType;
use App\CandidateLanguage;
use App\CareerLevel;
use App\Country;
use App\ExperienceYear;
use App\Gender;
use App\JobIndustry;
use App\JobType;
use App\Language;
use App\MartialStatus;
use App\MilitaryStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;

class CandidateCompleteRegister extends Controller
{
    public function register_job_industry(){
        $job_industries=JobIndustry::all();
        return view('candidate.auth.register_job_industry',compact('job_industries'));
    }
    public function post_register_job_industry(Request $request){
        $request->validate([
            'job_industries'=>'required',
        ]);
        $job_industries=sanitize($request->input('job_industries'));
        $job_industries_ids=explode(',',$job_industries);
        //check if they are more three
        if (count($job_industries_ids) <3){
            Session::flash('danger','You Should at Least Choose Three Job Industries');
            return redirect()->back();
        }
        //delete old job industries
        CandidateJobIndustry::where('candidate_id',Auth::guard('candidate')->id())->delete();
        //add new job industry
        foreach ($job_industries_ids as $job_industries_id){
            if (\App\JobIndustry::whereId($job_industries_id)->exists()){
                CandidateJobIndustry::create([
                    'candidate_id'=>Auth::guard('candidate')->id(),
                    'job_industry_id'=>$job_industries_id
                ]);
            }
        }
        return redirect()->route('candidate.register_career_interests');
    }

    public function register_career_interests(){
        $job_types=JobType::all();
        $career_levels=CareerLevel::all();
        return view('candidate.auth.register_career_interests',compact('job_types','career_levels'));
    }

    public function post_register_career_interests(Request $request){
        $request->validate([
            'career_level_id'=>'required|numeric',
            'job_types'=>'required',
            'job_title'=>'required|string',
            'job_industry_tags'=>"array|required",
            'job_industry_tags.*'=>"numeric",
        ],
            [
              'job_industry_tags.*.numeric'=>'Job Industry Tags Can only Be Chosen from Our Select Box  '
            ]);
        $job_title=sanitize($request->input('job_title'));
        $career_level_id=$request->input('career_level_id');
        $job_types=sanitize($request->input('job_types'));
        $job_types=explode(',',$job_types);
        $job_industry_tags=$request->input('job_industry_tags');
        $candidate=Auth::guard('candidate')->user();
        $candidate->job_title=$job_title;
        $candidate->career_level_id=$career_level_id;
        $candidate->save();
        CandidateJobType::where('candidate_id',$candidate->id)->delete();
        for ($i=0;$i<count($job_types); $i++){
            CandidateJobType::create([
                'candidate_id'=>$candidate->id,
                'job_type_id'=>$job_types[$i]
            ]);
        }
        CandidateJobIndustryTag::where('candidate_id',$candidate->id)->delete();
        for ($i=0;$i<count($job_industry_tags); $i++){
            CandidateJobIndustryTag::create([
                'candidate_id'=>$candidate->id,
                'tag_id'=>sanitize($job_industry_tags[$i])
            ]);
        }
        return redirect()->route('candidate.register_education_experience');
    }

    public function register_education_experience(){
        return view('candidate.auth.register_education_experience');
    }
    public function post_register_education_experience(Request $request){
        $request->validate([
            'university'=>'nullable|string',
            'faculty'=>'nullable|string',
            'major'=>'nullable|string',
            'degree'=>'nullable|string',
            'university_start_date'=>'nullable|date',
            'university_end_date'=>'nullable|date',
        ]);
        $university=sanitize($request->input('university'));
        $faculty=sanitize($request->input('faculty'));
        $major=sanitize($request->input('major'));
        $degree=sanitize($request->input('degree'));
        $university_start_date=sanitize($request->input('university_start_date'));
        $university_end_date=sanitize($request->input('university_end_date'));

        $job_titles=$request->input('job_title');
        $companies=$request->input('company_name');
        $companies_location=$request->input('company_location');
        $job_descriptions=$request->input('job_description');
        $salaries=$request->input('salary');
        $experience_start_dates=$request->input('start_date');
        $experience_end_dates=$request->input('end_date');
        $currents=$request->input('current');

        $candidate=Auth::guard('candidate')->user();
        $candidate->university=$university;
        $candidate->faculty=$faculty;
        $candidate->major=$major;
        $candidate->degree=$degree;

        $university_start_date?$candidate->university_start_date=$university_start_date:'';
        $university_end_date?$candidate->university_end_date=$university_end_date:'';
        $candidate->save();
        CandidateExperience::where('candidate_id',$candidate->id)->delete();
        if (is_array($job_titles)){
            for ($i=0;$i<count($job_titles); $i++){
                if ($job_titles[$i]){
                    CandidateExperience::create([
                        'candidate_id'=>$candidate->id,
                        'company_name'=>sanitize($companies[$i]),
                        'company_location'=>sanitize($companies_location[$i]),
                        'job_title'=>sanitize($job_titles[$i]),
                        'job_description'=>sanitize($job_descriptions[$i]),
                        'salary'=>sanitize($salaries[$i]),
                        'start_date'=>$experience_start_dates[$i]?sanitize($experience_start_dates[$i]):null,
                        'end_date'=>$experience_end_dates[$i]?sanitize($experience_end_dates[$i]):null,
                        'current'=>sanitize($currents[$i]),
                    ]);
                };
            }
        }
        return redirect()->route('candidate.register_personal_information');
    }
    public function register_personal_information(){
        $countries=Country::all();
        $languages=Language::all();
        $martial_statuses=MartialStatus::all();
        $military_statuses=MilitaryStatus::all();
        $genders=Gender::all();
        $years_of_experiences=ExperienceYear::all();
        return view('candidate.auth.register_personal_information',compact('years_of_experiences','countries','languages','martial_statuses','military_statuses','genders'));
    }
    public function post_register_personal_information(Request $request){
        $request->validate([
            'country_id'=>'nullable|numeric',
            'city_id'=>'nullable|numeric',
            'address'=>'nullable|string',
            'years_of_experience_id'=>'required|numeric',
            'phone1'=>'nullable|string',
            'phone2'=>'nullable|string',
            'birth_date'=>'nullable|date',
            'language'=>'nullable',
            'language.*'=>'numeric',
            'gender_id'=>'nullable|numeric',
            'martial_status_id'=>'nullable|numeric',
            'military_status_id'=>'nullable|numeric',
            'avatar'=>'nullable|mimes:jpg,png,peg,jpeg|max:50000',
            'cv'=>'nullable|mimes:doc,odt,pdf,rtf,tex,txt,wks,wpd,docx|max:50000',
        ]);
        $candidate=Auth::guard('candidate')->user();
        $address=sanitize($request->input('address'));
        $phone1=sanitize($request->input('phone1'));
        $phone2=sanitize($request->input('phone2'));
        if($file=$request->file('avatar')){
            $ext = strtolower($file->getClientOriginalExtension());
                $name=Auth::guard('candidate')->user()->user_name.'NewLifeHr'.time().'.'.$ext;
                $file->move('avatars',$name);
                $avatar=$name;
            $candidate->avatar=$avatar;
        }
        if($file=$request->file('cv')){
            $ext = strtolower($file->getClientOriginalExtension());
            $name=Auth::guard('candidate')->user()->user_name.'NewLifeHr'.time().'.'.$ext;
            $file->move('cvs',$name);
            $cv=$name;
            $candidate->cv=$cv;
        }
        $candidate->country_id=$request->input('country_id');
        $candidate->city_id=$request->input('city_id');
        $candidate->address=$address;
        $candidate->years_of_experience_id=$request->input('years_of_experience_id');
        $candidate->phone1=$phone1;
        $candidate->phone2=$phone2;
        $candidate->birth_date=$request->input('birth_date')?$request->input('birth_date'):null;
        $candidate->save();
        $languages=$request->input('language');
        if(!empty($languages)){
            CandidateLanguage::where('candidate_id',$candidate->id)->delete();
            for ($i=0;$i<count($languages); $i++){
                $lang=sanitize($languages[$i]);
                CandidateLanguage::create([
                    'candidate_id'=>$candidate->id,
                    'language_id'=>$lang
                ]);
            }
        }
        Session::flash('success','User Completed Successfully');
        return redirect()->route('candidate.dashboard');
    }



    function logout(){
        return redirect()->route('home');
    }
}
