<?php

namespace Richpolis\Repositories;

use Richpolis\Entities\Category;
use Richpolis\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
	public function getModel()
    {
        return new Category;
    }

    public function getList()
    {
    	return Category::lists('name','id');
    }    
}