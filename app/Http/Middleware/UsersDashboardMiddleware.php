<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UsersDashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('users')->check()){
            return redirect('users/login');
        }
        $initials='';
        $name=explode(' ',Auth::guard('users')->user()->name);
        foreach($name as $data){
            $initials.=substr($data,0,1);
        }
        $initials=strtoupper($initials);
        View::share('initials',$initials);
        View::share('currency',Auth::guard('users')->user()->currency);
        View::share('url_current',url()->current().'?'.http_build_query(request()->query()));
        return $next($request);
    }
}
