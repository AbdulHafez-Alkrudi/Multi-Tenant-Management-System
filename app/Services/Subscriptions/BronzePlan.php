<?php

namespace App\Services\Subscriptions;

class BronzePlan extends SubscriptionPlan
{

    protected function initializePlanDetail()
    {
        $this->name = 'Bronze Plan';
        $this->price = 29.99 ;
        $this->maxEmployees = 30 ;
        $this->maxProjects = 15 ;
    }
}
