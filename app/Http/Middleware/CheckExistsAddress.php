<?php

namespace CodeCommerce\Http\Middleware;


use Closure;
use Illuminate\Contracts\Auth\Guard;


class CheckExistsAddress
{
     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if ($this->auth->getUser()->address->count() == 0) {
            return redirect()->route('account.address',['redirect_to' => 'checkout']);
        }
        
        return $next($request);
    }
}
