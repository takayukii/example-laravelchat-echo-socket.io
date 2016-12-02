<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiUsersController extends Controller
{
	public function me()
	{
		return \Auth::user();
	}

    public function listUsers()
    {
	    return User::select(['id', 'name'])->get();
    }
}
