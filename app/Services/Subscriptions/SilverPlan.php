<?php

namespace App\Services\Subscriptions;

class SilverPlan extends SubscriptionPlan
{

    protected function initializePlanDetail()
    {
        $this->name = 'Silver Plan';
        $this->price = 49.99;
        $this->maxEmployees = 60 ;
        $this->maxProjects = 30 ;
    }
}
