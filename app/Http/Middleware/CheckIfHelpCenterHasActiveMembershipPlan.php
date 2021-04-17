<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfHelpCenterHasActiveMembershipPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!is_null(auth()->user()->membership) && auth()->user()->membership->membership_status == "ACTIVE"){
            return $next($request);
        }
        return redirect()->route('helpCenter.show.membership.payment.form');
    }
}
