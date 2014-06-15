<?php

namespace Richpolis\Repositories;

use Richpolis\Entities\Candidate;
use Richpolis\Entities\Category;
use Richpolis\Repositories\BaseRepository;

class CandidateRepository extends BaseRepository
{
	public function getModel()
    {
        return new Candidate;
    }
    
    public function findLasted($take = 10)
    {
        return Category::with(['candidates'=>function($q) use ($take){
            $q->take($take);
            $q->orderBy('created_at','DESC');
        },'candidates.user'])->get();
    }
    
}