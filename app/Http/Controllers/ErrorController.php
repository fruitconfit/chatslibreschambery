<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the 403 page.
     *
     * @return \Illuminate\Http\Response
     */
    public function error403()
    {
        return view('error.403');
    }

}
