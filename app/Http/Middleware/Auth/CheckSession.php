<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $lastActivity = session('last_activity', 0);
            error_log('Last Activity: ' . $lastActivity);


            if (isset($lastActivity) && (time() - $lastActivity > 300)) {
                Auth::logout();
                return redirect('/login')->with('error', 'You have been logged out due to inactivity.');
            }
        }


        session(['last_activity' => time()]);

        return $next($request);
    }
}
