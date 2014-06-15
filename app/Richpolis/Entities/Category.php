<?php

namespace Richpolis\Entities;

class Category extends \Eloquent 
{
    
	protected $fillable = [];
    
    public function candidates()
    {
        return $this->hasMany('Richpolis\Entities\Candidate');
    }
    
}