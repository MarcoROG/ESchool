<?php namespace App\Http\Middleware;

use App\Users\Secretary;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RedirectIfNotSecretary {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        /*if(get_class(Auth::user()) != Secretary::class){
            return new RedirectResponse(url('users'));
        }*/
		return $next($request);
	}

}
