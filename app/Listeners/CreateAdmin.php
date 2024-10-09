<?php

namespace App\Listeners;

use App\Events\CompanyRegistered;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {


    }

    /**
     * Handle the event.
     */
    public function handle(CompanyRegistered $event): void
    {
        $adminRole = Role::query()->where('name' , '=', 'admin')->first();
        // Giving Admin role to the user:
        $user = User::create([
            'company_id' => $event->company_id,
            'name' => $event->name,
            'email' => $event->email,
            'password' => /*Hash::make*/($event->password),
            'role_id' => $adminRole->id
        ]);
        $user->assignRole($adminRole);

        // Giving the permissions:
        $permissions = $adminRole->permissions()->pluck('name')->toArray();
        $user->givePermissionTo($permissions);
    }
}
