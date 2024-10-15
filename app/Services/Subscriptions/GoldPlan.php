<?php

namespace App\Services\Subscriptions;

class GoldPlan extends SubscriptionPlan
{

    protected function initializePlanDetail()
    {
        $this->name = 'Gold Plan';
        $this->price = 99.99 ;
        $this->maxEmployees = 100 ;
        $this->maxProjects = 50 ;
    }
}
