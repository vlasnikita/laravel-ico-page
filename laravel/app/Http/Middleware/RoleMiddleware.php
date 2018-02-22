<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) /*, $permission*/
    {


        if (Auth::guest()) {
            return redirect('/');
        }


        if (isset($request->user()->roles->first()->name) ){
            $role = $request->user()->roles->first()->name;
            if ($request->user()->hasRole($role)) {

                if($role == 'author'){
                    if(
                        substr(Request::path(), 0, 12) == 'admin/backup' ||
                        substr(Request::path(), 0, 13) == 'admin/setting' ||
                        substr(Request::path(), 0, 14) == 'admin/language' ||
                        substr(Request::path(), 0, 9) == 'admin/log' ||
                        substr(Request::path(), 0, 10) == 'admin/user' ||
                        substr(Request::path(), 0, 10) == 'admin/role' ||
                        substr(Request::path(), 0, 16) == 'admin/permission' ||
                        substr(Request::path(), 0, 15) == 'admin/dashboard' ||
                        substr(Request::path(), 0, 16) == 'admin/categories' ||
                        substr(Request::path(), 0, 14) == 'admin/comments' ||
                        substr(Request::path(), 0, 10) == 'admin/page'
                    ){
                        return redirect('/admin/news');
                    }
                }
                if($role == 'moderator'){
                    if(
                        substr(Request::path(), 0, 12) == 'admin/backup' ||
                        substr(Request::path(), 0, 13) == 'admin/setting' ||
                        substr(Request::path(), 0, 14) == 'admin/language' ||
                        substr(Request::path(), 0, 9) == 'admin/log' ||
                        substr(Request::path(), 0, 10) == 'admin/user' ||
                        substr(Request::path(), 0, 10) == 'admin/role' ||
                        substr(Request::path(), 0, 16) == 'admin/permission' ||
                        substr(Request::path(), 0, 15) == 'admin/dashboard'
                    ){
                        return redirect('/admin/news');
                    }

                }

                return $next($request);
            }
        }

//        if (! $request->user()->can($permission)) {
//            return redirect('/profile_personal');
//        }

        return redirect('/profile_personal');
    }

}
