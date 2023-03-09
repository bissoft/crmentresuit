<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $subscribe = $request->route()->getName();
            if ($subscribe == "subscribe") {
                $id = $request->segment(2);
                Session::put('plan_id', $id);
                return route('register');
            }
            return route('login');
        }
    }
}
