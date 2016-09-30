<?php

namespace Gasan\Http\Controllers\Api;

use Illuminate\Http\Request;

use Gasan\Http\Requests;
use Gasan\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    function login(Request $request)
    {
    	return response()->json(array(
    		'message'	=> 'Wahahahaha'
    	));
    }
}
