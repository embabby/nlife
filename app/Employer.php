<?php

namespace App;

use App\Notifications\EmployerResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'job_title',
        'phone',
        'company_id',
        'email',
        'password',
        'downloaded_cvs',
        'unlocked_accounts',
        'job_posts',
        'super_user',
        'active',
        'email_validated',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployerResetPassword($token));
    }

    function company(){
        return $this->belongsTo('App\Company','company_id');
    }
}
