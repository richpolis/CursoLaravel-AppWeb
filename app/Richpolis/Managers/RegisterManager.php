<?php

namespace Richpolis\Managers;

use Richpolis\Managers\BaseManager;

class RegisterManager extends BaseManager
{
    public function getRules()
    {
        $rules = [
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
        return $rules;
    }
}