<?php namespace App\Http\Middleware;

use Closure;

class RedirectNotManager {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if($request->user()){
            if(! $request->user()->hasRole('Super Admin')){
                return redirect(action('ErrorsController@show',404));
            }
        }else{
            return redirect(action('ErrorsController@show',404));
        }
		return $next($request);
	}

}
