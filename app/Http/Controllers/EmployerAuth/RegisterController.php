<?php

namespace App\Http\Controllers\EmployerAuth;

use App\Company;
use App\CompanyJobIndustry;
use App\CompanySize;
use App\CompanyType;
use App\Country;
use App\Employer;
use App\JobIndustry;
use App\TrailPlan;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/employer/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employer.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|max:255',
            'company_phone' => 'required',
            'website' => 'required',
            'job_industry.*' => 'required|numeric',
            'job_industry' => 'required|array',
            'company_size_id' => 'required|numeric',
            'company_type_id' => 'required|numeric',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'job_title' => 'required|max:300',
            'phone' => 'required|max:30',
            'email' => 'required|email|max:255|unique:employers',
            'password' => 'required|min:6|confirmed',
            'country_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required|string|max:255',
            'terms_conditions'=>'required|in:1',
        ],[
            'job_industry.*.numeric'=>'Job Industry Can Be Only Chosen From The Select Box'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Employer
     */
    protected function create(array $data)
    {
        $trail=TrailPlan::first();

        $company=Company::create([
            'name'=>sanitize($data['company_name']),
            'phone'=>sanitize($data['company_phone']),
            'website'=>sanitize($data['website']),
            'company_size_id'=>$data['company_size_id'],
            'company_type_id'=>$data['company_size_id'],
            'country_id'=>$data['country_id'],
            'city_id'=>$data['city_id'],
            'address'=>$data['address'],
            'email_preference'=>$data['email'],
            'terms_conditions'=>$data['terms_conditions']?$data['terms_conditions']:0,
            'plan_job_posts'=>$trail->job_posts,
            'plan_profiles'=>$trail->profiles,
            'plan_cvs'=>$trail->cvs,
            'plan_expiry_days'=>$trail->expiry_days,
            'plan_start_date'=>Carbon::now()->toDateString(),
            'plan_end_date'=>Carbon::now()->addDays($trail->expiry_days)->toDateString(),
        ]);
        $company->slug=$company->name.'-'.$company->id;
        $company->save();

        for ($i=0;$i<count($data['job_industry']);$i++){
            if ($data['job_industry'][$i]){
                CompanyJobIndustry::create([
                    'company_id'=>$company->id,
                    'job_industry_id'=>sanitize($data['job_industry'][$i])
                ]);
            }
        }
        return Employer::create([
            'first_name' => sanitize($data['first_name']),
            'last_name' => sanitize($data['last_name']),
            'job_title' => sanitize($data['job_title']),
            'phone' => sanitize($data['phone']),
            'email' => $data['email'],
            'company_id' => $company->id,
            'password' => bcrypt($data['password']),
            'super_user'=>1
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $job_industries=JobIndustry::all();
        $company_sizes=CompanySize::all();
        $company_types=CompanyType::all();
        $countries=Country::all();
        return view('employer.auth.register',compact('job_industries','company_sizes','company_types','countries'));
    }

    /**
     * countries
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employer');
    }
}
