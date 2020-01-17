<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class TokenAuthenticate
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
        
            $user = User::where('id',$request->user_id)->Where('remember_token',$request->token)->exists();
            if(!$user){
                    $response = [
                        'status' => 422,
                        'errors' => 'Invalid access token'
                    ];
            return response()->json($response);
            }
            return $next($request);
    }
}
