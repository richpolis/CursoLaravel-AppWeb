<?php

namespace Richpolis\Entities;

class Candidate extends \Eloquent 
{
	protected $fillable = [];
    protected $perPage = 5;
	
    public function user()
    {
        return $this->hasOne('Richpolis\Entities\User','id','id');
    }
    
    public function category()
    {
        return $this->belongsTo('Richpolis\Entities\Category');
    }
    
    public function getJobTypeTitleAttribute()
    {
        return \Lang::get('utils.job_types.'.$this->job_type);
    }
}