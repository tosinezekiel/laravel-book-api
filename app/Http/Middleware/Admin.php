<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            $userRoles = User::find($request->user_id)->roles()->pluck('role_name');
            if(!$userRoles->contains('admin')){
                    $response = [
                        'status' => 422,
                        'errors' => 'Invalid access'
                    ];
                return response()->json($response);
            }
        return $next($request);
    }
}
