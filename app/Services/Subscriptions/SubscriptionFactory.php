<?php

namespace App\Services\Subscriptions;

class SubscriptionFactory
{
    /**
     * @throws \Exception
     */
    public static function getSubscriptionPlan(string $plan): SubscriptionPlan
    {
        switch ($plan){
            case 'free':
                return new FreePlan();
            case 'bronze':
                return new BronzePlan();
            case 'silver':
                return new SilverPlan();
            case 'gold':
                return new GoldPlan();
            default:
                throw new \Exception('Invalid Subscription plan: {$plan}');

        }


    }
}
