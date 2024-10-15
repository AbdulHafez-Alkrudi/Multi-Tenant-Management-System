<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Services\Subscriptions\SubscriptionFactory;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeLimit
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company = Company::query()->where('invitation_code', $request->invitation_code)->first();
        if($company){
            // getting the subscription type of the company and counting the number of employees it has
            $subscription = SubscriptionFactory::getSubscriptionPlan($company->subscription_name);
            if($company->employees()->count() >= $subscription->getMaxEmployees()){
                return response()->json(['message' => 'employee limit reached']);
            }
        }
        return $next($request);
    }
}
