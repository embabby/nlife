<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'indexController@index')->name('home');
Route::get('/contact-us', 'ContactController@index')->name('contact-us');
Route::post('/contact-us', 'ContactController@store');
Route::get('blog','BlogController@index')->name('blog.index');
Route::get('blog/{slug}','BlogController@show')->name('blog.show');
Route::get('jobs','JobsController@index')->name('jobs.index');
Route::get('job/{slug}','JobsController@show')->name('jobs.show');
Route::get('/cities/ajax/{id}','HelpersController@cities')->name('cities_ajax');
Route::get('/benefits/ajax/{id}','HelpersController@benefits')->name('benefits_ajax');
Route::get('/industries/tags/{id}','HelpersController@job_industry_tags')->name('job_industry_tags');
Auth::routes();


/*
 * company Profile
 */
Route::get('/company-profile/home/{slug}','CompanyProfileController@home')->name('companyProfile.home');
Route::get('/company-profile/benefits/{slug}','CompanyProfileController@benefits')->name('companyProfile.benefits');
Route::get('/company-profile/images/{slug}','CompanyProfileController@images')->name('companyProfile.images');
Route::get('/company-profile/jobs/{slug}','CompanyProfileController@jobs')->name('companyProfile.jobs');



Route::group(['prefix' => 'candidate'], function () {
  Route::get('/login', 'CandidateAuth\LoginController@showLoginForm')->name('candidate.login');
  Route::post('/login', 'CandidateAuth\LoginController@login');
  Route::post('/logout', 'CandidateAuth\LoginController@logout');
  Route::get('/register', 'CandidateAuth\RegisterController@showRegistrationForm')->name('candidate.register');
  Route::post('/register', 'CandidateAuth\RegisterController@register');
  Route::post('/password/email', 'CandidateAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'CandidateAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'CandidateAuth\ForgotPasswordController@showLinkRequestForm')->name('candidate.reset');
  Route::get('/password/reset/{token}', 'CandidateAuth\ResetPasswordController@showResetForm');
  Route::get('/logout', 'CandidateAuth\CandidateCompleteRegister@logout');
    Route::group(['middleware' =>['isCandidate','candidate']], function () {
        //second register
        Route::get('/register_job_industry', 'CandidateAuth\CandidateCompleteRegister@register_job_industry')->name('candidate.register_job_industry');
        Route::post('/register_job_industry', 'CandidateAuth\CandidateCompleteRegister@post_register_job_industry')->name('candidate.post_register_job_industry');
        Route::get('/register_career_interests', 'CandidateAuth\CandidateCompleteRegister@register_career_interests')->name('candidate.register_career_interests');
        Route::post('/register_career_interests', 'CandidateAuth\CandidateCompleteRegister@post_register_career_interests')->name('candidate.post_register_career_interests');
        Route::get('/register_education_experience', 'CandidateAuth\CandidateCompleteRegister@register_education_experience')->name('candidate.register_education_experience');
        Route::post('/register_education_experience', 'CandidateAuth\CandidateCompleteRegister@post_register_education_experience')->name('candidate.post_register_education_experience');
        Route::get('/register_personal_information', 'CandidateAuth\CandidateCompleteRegister@register_personal_information')->name('candidate.register_personal_information');
        Route::post('/register_personal_information', 'CandidateAuth\CandidateCompleteRegister@post_register_personal_information')->name('candidate.post_register_personal_information');
        //Account
       Route::get('/dashboard', 'Candidate\HomeController@dashboard')->name('candidate.dashboard');
       Route::get('/account/', 'Candidate\UpdateCandidateProfileController@edit')->name('account.edit');
       Route::patch('/account/{slug}', 'Candidate\UpdateCandidateProfileController@update')->name('account.update');
       Route::post('account/update-experience','Candidate\UpdateCandidateProfileController@add_experience');
       Route::patch('/account2/{id}', 'Candidate\UpdateCandidateProfileController@ExperienceUpdate')->name('account.ExperienceUpdate');
       Route::patch('/account3/{slug}', 'Candidate\UpdateCandidateProfileController@EducationUpdate')->name('account.EducationUpdate');
       Route::delete('/account2/{id}', 'Candidate\UpdateCandidateProfileController@destroy')->name('account.Experiencedelete ');
       Route::patch('/account/UpdateJobIndustryTags/{slug}', 'Candidate\UpdateCandidateProfileController@jobIndustryJobTagsUpdate')->name('account.jobIndustryJobTagsUpdate');
       Route::patch('/account/job_preference_update/{slug}', 'Candidate\UpdateCandidateProfileController@job_preference_update')->name('account.job_preference_update');
       Route::post('/account/change_password', 'Candidate\UpdateCandidateProfileController@change_password')->name('account.change_password');
       Route::get('profile','Candidate\ProfileController@profile')->name('candidate.profile');
       Route::get('profile/download_cv','Candidate\ProfileController@download_cv')->name('candidate.download_cv');

       Route::post('profile/upload_cv','Candidate\ProfileController@upload_cv')->name('candidate.upload_cv');
       Route::get('profile/create_cv','Candidate\ProfileController@create_cv')->name('candidate.create_cv');

       // jobs
        Route::post('saved-jobs','Candidate\CandidateSavedJobsController@store')->name('saved-jobs.store');
        Route::post('job-application','Candidate\JobApplicationController@store')->name('job-application.store');
        Route::get('jobs/all','Candidate\HomeController@all_jobs')->name('candidate.jobs.all_jobs');
        Route::get('jobs/applied','Candidate\HomeController@applied')->name('candidate.jobs.applied');
        Route::get('jobs/saved','Candidate\HomeController@saved')->name('candidate.jobs.saved');
        Route::get('jobs/recommended','Candidate\HomeController@recommended')->name('candidate.jobs.recommended');
        
        //Search
        Route::get('search','Candidate\HomeController@search')->name('candidate.search');

    });
});


/*
 * Employers
 */
Route::group(['prefix' => 'employer'], function () {
    Route::get('/login', 'EmployerAuth\LoginController@showLoginForm')->name('employer.login');
    Route::post('/login', 'EmployerAuth\LoginController@login');
    Route::post('/logout', 'EmployerAuth\LoginController@logout')->name('logout');
    Route::get('/register', 'EmployerAuth\RegisterController@showRegistrationForm')->name('employer.register');
    Route::post('/register', 'EmployerAuth\RegisterController@register');
    Route::post('/password/email', 'EmployerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'EmployerAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'EmployerAuth\ForgotPasswordController@showLinkRequestForm')->name('employer.reset');
    Route::get('/password/reset/{token}', 'EmployerAuth\ResetPasswordController@showResetForm');

    Route::get('terms-conditions', function () {return view('employer.auth.terms-conditions');})->name('employer.terms-conditions');

Route::group(['middleware' =>['isEmployer','employer']], function () {
    Route::get('/dashboard','Employer\HomeController@index')->name('employer.dashboard');
    Route::get('/companies-account','Employer\CompaniesAccountController@edit')->name('companiesAccount.edit');
    Route::patch('/companies-account/{id}','Employer\CompaniesAccountController@update')->name('companiesAccount.update');
    Route::get('/companies-benefits','Employer\CompanyBenefitController@edit')->name('companyBenefit.edit');
    Route::patch('/companies-benefits/{id}','Employer\CompanyBenefitController@update')->name('companyBenefit.update');
    Route::get('/companies-social','Employer\CompanySocialController@edit')->name('companySocial.edit');
    Route::patch('/companies-social/{id}','Employer\CompanySocialController@update')->name('companySocial.update');
    Route::resource('companies-images','Employer\CompanyImagesController');
    Route::get('/companies-email-preference','Employer\CompanyEmailPreferenceController@edit')->name('companyEmailPreference.edit');
    Route::patch('/companies-email-preference/{id}','Employer\CompanyEmailPreferenceController@update')->name('companyEmailPreference.update');
    Route::resource('companies-users','Employer\CompanyUsersController');
    Route::patch('companies-users-change-password/{id}','Employer\CompanyUsersController@changePassword')->name('companies-users.changePassword');
    Route::get('companies-plans','Employer\CompanyPlansController@index')->name('companyPlans.index');
    Route::resource('employer-jobs','Employer\EmployerJobsController');
    route::get('employer-jobs-applied/{slug}','Employer\EmployerJobsController@applied')->name('employer-jobs.applied');
    route::get('employer-jobs-shortlisted/{slug}','Employer\EmployerJobsController@shortlisted')->name('employer-jobs.shortlisted');
    route::get('employer-jobs-accepted/{slug}','Employer\EmployerJobsController@accepted')->name('employer-jobs.accepted');
    route::get('employer-jobs-rejected/{slug}','Employer\EmployerJobsController@rejected')->name('employer-jobs.rejected');
    route::get('candidate/unlocked-candidates','Employer\CandidatesController@unlocked_candidates')->name('employer.candidate.unlocked');
    route::get('candidate/show/{slug}/{job_slug}','Employer\CandidatesController@show_candidate')->name('employer.candidate.show');

    Route::get('candidate/download-cv/{applicant_id}','Employer\CandidatesController@download_cv')->name('employer.cv.download');
    Route::get('candidate/status/{applicant_id}/{type}','Employer\CandidatesController@changeStatus')->name('employer.candidate.status');

    Route::post('companies-plans','Employer\CompanyPlansController@makePlanRequest')->name('companyPlans.request');
});
});

/*
 * voyager
 */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
