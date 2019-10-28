<?php

namespace App\Http\Controllers\Candidate;

use App\Candidate;
use App\CandidateExperience;
use App\CandidateJobIndustry;
use App\CandidateJobIndustryTag;
use App\CandidateLanguage;
use App\CareerLevel;
use App\City;
use App\Country;
use App\Currency;
use App\ExperienceYear;
use App\Gender;
use App\JobIndustry;
use App\Language;
use App\MartialStatus;
use App\MilitaryStatus;
use App\OpenForJobStatus;
use App\SalaryType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UpdateCandidateProfileController extends Controller
{

    public function edit()
    {
        $countries=Country::all();
        $cities=City::all();
        $martial_statuses=MartialStatus::all();
        $military_statuses=MilitaryStatus::all();
        $languages=Language::all();
        $genders=Gender::all();
        $candidate=Auth::guard('candidate')->user();
        $job_industries=JobIndustry::all();
        $candidate_languages=CandidateLanguage::where('candidate_id',$candidate->id)->pluck('language_id')->toArray();
        $candidate_job_industries=CandidateJobIndustry::where('candidate_id',$candidate->id)->pluck('job_industry_id')->toArray();
        $candidate_job_industries_tags=CandidateJobIndustryTag::where('candidate_id',$candidate->id)->pluck('tag_id')->toArray();
        $open_for_job_statuses=OpenForJobStatus::all();
        $career_levels=CareerLevel::all();
        $experience_years=ExperienceYear::all();
        $salary_types=SalaryType::all();
        $currencies=Currency::all();
        return view('candidate.updateprofile',compact('salary_types','currencies','career_levels','experience_years','open_for_job_statuses','candidate_job_industries_tags','candidate_job_industries','job_industries','candidate_languages','candidate','countries','cities','martial_statuses','military_statuses','genders','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'user_name' => 'required|max:100|unique:candidates,id',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:candidates,id',
            'phone1' => 'required|max:30',
            'phone2' => 'nullable|max:30',
            'country_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required|string',
            'birth_date'=>'required|date',
            'gender_id'=>'nullable|numeric',
            'martial_status_id'=>'nullable|numeric',
            'military_status_id'=>'nullable|numeric',
            'language.*'=>'numeric',
            'avatar'=>'mimes:jpg,png,peg,jpeg|max:50000',
            'cv'=>'nullable|mimes:doc,odt,pdf,rtf,tex,txt,wks,wpd,docx|max:50000',
        ]);
        $candidate=Auth::guard('candidate')->user();

        $candidate->first_name=sanitize($request->first_name);

        $candidate->last_name=sanitize($request->last_name);
        $candidate->user_name=sanitize($request->user_name);
        $candidate->email=sanitize($request->email);
        $candidate->phone1=sanitize($request->phone1);
        $candidate->phone2=sanitize($request->phone2);
        $candidate->address=sanitize($request->address);
        $candidate->about_me=sanitize($request->about_me);
        $candidate->gender_id=sanitize($request->gender_id);
        $candidate->martial_status_id=sanitize($request->martial_status_id);
        $candidate->military_status_id=sanitize($request->military_status_id);
        $candidate->birth_date=sanitize($request->birth_date);
        $candidate->country_id=$request->input('country_id');
        $candidate->city_id=$request->input('city_id');

        if($file=$request->file('avatar')){
            if($candidate->avatar && Storage::disk('local')->exists($candidate->avatar)){
                unlink(public_path().'/storage/'.$candidate->avatar);
            }
            $file->move('storage/candidates/'.Carbon::now()->format('FY'),time().$file->getClientOriginalName());
            $avatar='candidates/'.Carbon::now()->format('FY').'/'.time().$file->getClientOriginalName();
            $candidate->avatar=$avatar;
        }
        if($file=$request->file('cv')){
            if($candidate->cv && Storage::disk('local')->exists($candidate->cv)){
                unlink(public_path().'/storage/'.$candidate->cv);
            }
            $file->move('storage/candidates/'.Carbon::now()->format('FY'),'newlifehr.com-'.time().$file->getClientOriginalName());
            $cv='candidates/'.Carbon::now()->format('FY').'/newlifehr.com-'.time().$file->getClientOriginalName();
            $candidate->cv=$cv;
        }

        $candidate->save();

        $languages=$request->input('language');
        if(!empty($languages)){
            CandidateLanguage::where('candidate_id',Auth::guard('candidate')->user()->id)->delete();
            for ($i=0;$i<count($languages); $i++){
                $lang=sanitize($languages[$i]);
                CandidateLanguage::create([
                    'candidate_id'=>$candidate->id,
                    'language_id'=>$lang
                ]);
            }
        }
        Session::flash('success','personal Information updated Successfully');
        return redirect()->back();
    }


    public function ExperienceUpdate(Request $request,$id){

        $candidate_experience=CandidateExperience::find($id);
        $candidate_experience->job_title=sanitize($request->job_title);
        $candidate_experience->company_name=sanitize($request->company_name);
        $candidate_experience->company_location=sanitize($request->company_location);
        $candidate_experience->salary=sanitize($request->salary);

        $candidate_experience->start_date=$request->start_date?$request->start_date:null;
        $candidate_experience->end_date=$request->end_date?$request->end_date:null;
        $candidate_experience->current=sanitize($request->current);
        $candidate_experience->job_description=sanitize($request->job_description);
        $candidate_experience->save();
        Session::flash('success','Experience updated Successfully');
        return redirect()->back();


    }

    public function add_experience(Request $request){

        $job_titles=$request->input('job_title');
        $companies=$request->input('company_name');
        $companies_location=$request->input('company_location');
        $job_descriptions=$request->input('job_description');
        $salaries=$request->input('salary');
        $experience_start_dates=$request->input('start_date');
        $experience_end_dates=$request->input('end_date');
        $currents=$request->input('current');
        $candidate=Auth::guard('candidate')->user();
        $candidate->save();

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
        Session::flash('success','Experience Added Successfully');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate_experience=CandidateExperience::find($id);
        $candidate_experience->delete();
        Session::flash('danger','Experience Deleted Successfully');
        return redirect()->back();
    }

    public function EducationUpdate(Request $request,$slug){
        $request->validate([
            'university'=>'nullable|string',
            'faculty'=>'nullable|string',
            'major'=>'nullable|string',
            'degree'=>'nullable|string',
            'university_start_date'=>'nullable|date',
            'university_end_date'=>'nullable|date',
        ]);

        $candidate=Candidate::where('slug',$slug)->first();

        $candidate->university=sanitize($request->university);
        $candidate->faculty=sanitize($request->faculty);
        $candidate->major=sanitize($request->major);
        $candidate->degree=sanitize($request->degree);
        $candidate->university_start_date=$request->university_start_date?$request->university_start_date:null;
        $candidate->university_end_date=$request->university_end_date?$request->university_end_date:null;
        $candidate->save();
        Session::flash('success','Education updated Successfully');
        return redirect()->back();
    }


    public function jobIndustryJobTagsUpdate(Request $request,$slug){
        $request->validate([
            'job_industries.*'=>'numeric',
            'job_industries_tags.*'=>'numeric',
        ]);

        $this->validate($request, [
        'job_industries' => 'required',
        'job_industries_tags' => 'required',
    ]);

        $candidate=Auth::guard('candidate')->user();
        if (count($request->input('job_industries')) <3){
            Session::flash('danger','You Should at Least Choose Three Job Industries');
            return redirect()->back();
        }
        //delete old job industries
        CandidateJobIndustry::where('candidate_id',Auth::guard('candidate')->id())->delete();
        //add new job industry
        foreach ($request->input('job_industries') as $job_industries_id){
            if (\App\JobIndustry::whereId($job_industries_id)->exists()){
                CandidateJobIndustry::create([
                    'candidate_id'=>$candidate->id,
                    'job_industry_id'=>$job_industries_id
                ]);
            }
        }

        CandidateJobIndustryTag::where('candidate_id',$candidate->id)->delete();
        for ($i=0;$i<count($request->input('job_industries_tags')); $i++){
            CandidateJobIndustryTag::create([
                'candidate_id'=>$candidate->id,
                'tag_id'=>sanitize($request->input('job_industries_tags')[$i])
            ]);
        }

        Session::flash('success','Job Industries and Tags Updated Successfully');
        return redirect()->back();
    }


    public function change_password(Request $request){
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);
        $candidate=Auth::guard('candidate')->user();
        if (Hash::check($request->input('old_password'),$candidate->password)){
            $candidate->password=bcrypt($request->input('password'));
            $candidate->save();
            Session::flash('success','Password Changes Successfully');
            return redirect()->back();
        }else{
            Session::flash('danger','Old Password Does\'t Match Our Credentials');
            return redirect()->back();
        }
    }

    public function job_preference_update(Request $request){
        $request->validate([
            'job_title'=>'nullable|string',
            'current_salary'=>'nullable|numeric',
            'desired_salary'=>'nullable|numeric',
            'open_for_job_status_id'=>'nullable|numeric',
            'career_level_id'=>'nullable|numeric',
            'years_of_experience_id'=>'nullable|numeric',
            'salary_type_id'=>'nullable|numeric',
            'currency_id'=>'nullable|numeric',
        ]);

        $candidate=Auth::guard('candidate')->user();
        $candidate->job_title=sanitize($request->input('job_title'));
        $candidate->current_salary=$request->input('current_salary');
        $candidate->desired_salary=$request->input('desired_salary');
        $candidate->open_for_job_status_id=$request->input('open_for_job_status_id');
        $candidate->career_level_id=$request->input('career_level_id');
        $candidate->years_of_experience_id=$request->input('years_of_experience_id');
        $candidate->salary_type_id=$request->input('salary_type_id');
        $candidate->currency_id=$request->input('currency_id');
        $candidate->save();
        Session::flash('success','Job PreferenceUpdated Successfully');
        return redirect()->back();
    }
}
