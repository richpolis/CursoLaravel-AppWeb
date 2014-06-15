<?php

namespace Richpolis\Repositories;

use Richpolis\Entities\Category;

class CategoryRepository 
{
	public function find($id)
    {
        return Category::find($id);
    }    
}