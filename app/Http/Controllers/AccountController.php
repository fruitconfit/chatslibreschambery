<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account');
    }

    public function modify(Request $request)
    {
        if(null !== $request->input('email')){
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if($request->input('password') != ''){
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();
        }
        return view('account');
    }
}
