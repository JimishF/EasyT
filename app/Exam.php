<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Exam extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exam_master';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['e_id'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    public $timestamps = false;

}
