<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Check User is connected & Permission exist for this page
        $path = substr($request->getPathInfo(),1);
        if(null !== Auth::User() && count(Permission::where("name", "=",$path)->get()) > 0){
            if (!Auth::User()->hasPermissionTo('all') && $path != 'home' && !Auth::User()->hasPermissionTo($path)) {
                return redirect('/home');
            }
        }
        //dump($request->getPathInfo(), Auth::User()->hasPermissionTo('all'));
        //dump(User::permission('edit articles')->get()[0] == Auth::User());
        //die;

        return $next($request);
    }
}
