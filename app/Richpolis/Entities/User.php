<?php

namespace Richpolis\Entities;

class User extends \Eloquent {

	protected $table = 'users';
    
    /*
     * The attributes excluded from the model's JSON form
     * 
     * @var array
    */
    protected $hidden = array('password');
    
    protected $fillable = array('full_name','email','password');
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password']= \Hash::make($value);
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