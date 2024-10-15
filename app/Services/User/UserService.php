<?php

namespace App\Http\Services\User;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    public function register($request)
    {
        $company = Company::where('invitation_code' , '=' , $request['invitation_code'])->first();
        if(!$company)
        {
            return ['data' => '', 'message' => 'invalid invitation code'];
        }
        $employeeRole = Role::query()->where('name', '=', 'employee')->first();

        $user = User::query()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'company_id' => $company->id,
            'role_id' => $employeeRole->id
        ]);

        $user->assignRole($employeeRole);

        // Assigning the Permissions to the user:
        $permissions = $employeeRole->permissions()->pluck('name')->toArray();
        $user->givePermissionTo($permissions);

        $user->load('roles', 'permissions');
        $user['token'] = $user->createToken('AccessToken')->plainTextToken;
        return $user;

    }
    public function login($request)
    {
        /*$user = User::query()->where('email' , $request->email);
        $message = null;
        $code = 0 ;
        if(is_null($user))
        {
            $message = 'something went wrong, please try again' ;
            $code = 401 ;
        }*/
        $user = null;
        $message = null;
        $code = null ;
        if(Auth::attempt( ['email' => $request['email'], 'password' => $request['password']]))
        {
            $user = User::query()->where('email',  $request['email'])->first();
            $user['token'] = $user->createToken('AccessToken')->accessToken ;
            $message = 'User Logged-in Successfully' ;
            $code = 200 ;
        }else{
            $message = "your credentials aren't valid, please try again";
            $code = 401 ;
        }
        return ['user' => $user, 'message' => $message, 'code' => $code] ;
    }
    public function logout($request)
    {
        $user = Auth::user();
        if(!is_null($user))
        {
            $user->currentAccesssToken()->delete();
            $message = 'the user Logged-out successfully';
            $code = 200 ;
        }
        else{
            $message = "invalid token";
            $code = 404 ;
        }
        return ['message' => $message, 'code' => $code];
    }
    private function appendRolesAndPermissions($user)
    {
        $roles = [] ;
        foreach($user->roles as $role)
        {
            $roles[] = $role;
        }
        unset($user['roles']);
        $user['roles'] = $roles;
        $permissions = [] ;
        foreach($user->permissions as $permission)
        {
            $permissions[] = $permission ;
        }
        unset($user['permissions']);
        $user['permissions'] = $permissions ;
        return $user ;


    }
}
