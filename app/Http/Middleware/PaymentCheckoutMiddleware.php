<?php

namespace App\Http\Middleware;

use Closure;

class PaymentCheckoutMiddleware
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
        //get current user
        $user = $request->user();
        //get the offer id
      //  $offer_id = $request->input('offer_id');

        //if user exsits and braintree id is true
        if($user && $user->braintree_id != null){

            return $next($request);
        }
        else{
            return redirect('payment');
        }
    }
}
