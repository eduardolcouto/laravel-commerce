<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class TesteController extends Controller
{
    public function getTrocaUsuario()
    {
    	if(Auth::check())
    	{
    		Auth::user();
    	}
    }
}
