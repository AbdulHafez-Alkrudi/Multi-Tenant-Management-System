<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create the rules:
        $adminRole = Role::create(['name' => 'admin']);
        $employeeRole = Role::create(['name' => 'employee']);
        $teamLeaderRole = Role::create(['name' => 'teamLeader']);
        // Defining the permissions:
        $permissions = [
            'create_project', 'view_project',
            'create_task', 'view_task',
            'send_message', 'view_messages',
            'view_budget' , 'charge_budget',
        ];
        foreach($permissions as $permission)
        {
            Permission::findOrCreate($permission, 'web');
        }
        $adminRole->syncPermissions(['create_project', 'view_project', 'send_message', 'view_messages', 'view_budget', 'charge_budget']); // syncPermission function delete all the previous permissions (if existed) and add the new once
        $teamLeaderRole->givePermissionTo(['view_project','create_task', 'view_task', 'send_message', 'view_messages']); // Adding new Permissions to the current roles
        $employeeRole->givePermissionTo(['send_message', 'view_task', 'send_message', 'view_messages']);

    }
}
