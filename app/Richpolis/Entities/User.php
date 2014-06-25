<?php

namespace Richpolis\Entities;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';
    
    /*
     * The attributes excluded from the model's JSON form
     * 
     * @var array
    */
    protected $hidden = array('password');
    
    protected $fillable = array('full_name','email','password');
    
    
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
    
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    
    public function setPasswordAttribute($value)
    {
        if(! empty($value))
        {
        	$this->attributes['password']= \Hash::make($value);    
        }
    }
    

	public static function isLogged()
	{
		if(Session::has('user_id'))
			return true;
		else
			return false;
	}

	public static function isAdmin()
	{
		if(Session::get('user_type') > 1)
			return true;
		else
			return false;
	}

	/*public function posts()
	{
		return $this->hasMany('Post');
	}*/
    
    
	
    
}