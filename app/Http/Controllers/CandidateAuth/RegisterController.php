<?php

namespace App\Http\Controllers\CandidateAuth;

use App\Candidate;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/candidate/register_job_industry';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('candidate.guest');
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
            'user_name' => 'required|max:100|unique:candidates',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:candidates',
            'password' => 'required|min:6|confirmed',
            'phone1' => 'required|max:30',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Candidate
     */
    protected function create(array $data)
    {
        $first_name=sanitize($data['first_name']);
        $last_name=sanitize($data['last_name']);
        $user_name=sanitize($data['user_name']);
        $email=sanitize($data['email']);
        $phone1=sanitize($data['phone1']);

        $candidate= Candidate::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_name' => $user_name,
            'email' => $email,
            'phone1' => $phone1,
            'password' => bcrypt($data['password']),
        ]);
        $candidate->slug=$candidate->user_name.'-'.$candidate->id;
        $candidate->save();
        return $candidate;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('candidate.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('candidate');
    }
}
