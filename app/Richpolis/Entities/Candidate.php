<?php

namespace Richpolis\Entities;

class Candidate extends \Eloquent 
{
	protected $fillable = [];
	
    public function user()
    {
        return $this->hasOne('Richpolis\Entities\User','id','id');
    }
    
    
    
}