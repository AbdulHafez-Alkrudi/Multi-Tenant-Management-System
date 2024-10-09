<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscription::create([
            'name' => 'free plan',
            'number_of_employees' => '10',
            'number_of_projects' => '5',
            'price' => 0
        ]);
        Subscription::create([
            'name' => 'silver plan',
            'number_of_employees' => '30',
            'number_of_projects' => '15',
            'price' => 100
        ]);
        Subscription::create([
            'name' => 'gold plan',
            'number_of_employees' => '100',
            'number_of_projects' => '40',
            'price' => 300
        ]);
    }
}
