<?php

namespace App\Contracts;

interface SubscriptionInterface
{
    public function getMaxEmployees();
    public function setMaxEmployees($maxEmployees);
    public function getMaxProjects();
    public function setMaxProjects($maxProjects);
    public function getName();
    public function setName($name);
    public function getPrice();
    public function setPrice($price);
}
