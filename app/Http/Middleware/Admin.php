<?php

namespace App\Http\Middleware;

use Closure;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if ($request->session()->exists('admin_id') && $request->session()->exists('is_login') && $request->session()->get('is_login') === 'true') {
            return $next($request);
        }
        //return redirect()->to('/login')->send();
        return redirect()->back();
    }

}
