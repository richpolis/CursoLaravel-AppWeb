<?php

namespace Richpolis\Managers;

use Richpolis\Managers\BaseManager;

class ProfileManager extends BaseManager
{
    public function getRules()
    {
        $rules = [
            'website_url'   =>  'required|url',
            'description'   =>  'required|max:1000',
            'job_type'      =>  'required|in:full,partial,freelance',
            'categoria_id'  =>  'required|exists:categories,id',
            'available'     =>  'in:1,0',
        ];
        return $rules;
    }
}