<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class WordpressAdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!function_exists('is_user_logged_in') || !is_user_logged_in()){
            return redirect(wp_login_url($request->getRequestUri()));
        }

        if(!current_user_can('administrator')){
            abort(403, "no tienes permisos");
        }
        return $next($request);
    }
}
