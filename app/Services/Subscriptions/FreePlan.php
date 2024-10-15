<?php

namespace App\Services\Subscriptions;

class FreePlan extends SubscriptionPlan
{
    protected function initializePlanDetail()
    {
        $this->name = 'Free Plan';
        $this->price = 0.0 ;
        $this->maxEmployees = 10 ;
        $this->maxProjects = 5 ;
    }


}
