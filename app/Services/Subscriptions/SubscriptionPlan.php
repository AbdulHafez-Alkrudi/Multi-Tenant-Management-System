<?php

namespace App\Services\Subscriptions;

use App\Contracts\SubscriptionInterface;

abstract class SubscriptionPlan implements SubscriptionInterface
{
    protected $name , $price , $maxEmployees, $maxProjects;
    abstract protected function initializePlanDetail();
    public function __construct()
    {
        $this->initializePlanDetail();
    }
    /**
     * @return mixed
     */
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price ;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name ;
    }

    public function getMaxProjects()
    {
        return $this->maxProjects;
    }

    public function setMaxProjects($maxProjects)
    {
        $this->maxProjects = $maxProjects;
    }


    public function getMaxEmployees(): int
    {
        return $this->maxEmployees;
    }

    public function setMaxEmployees($maxEmployees): void
    {
        $this->maxEmployees = $maxEmployees;
    }

}
