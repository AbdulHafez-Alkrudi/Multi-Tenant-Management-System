<?php

namespace App\Http\Services\Company;

use App\Events\CompanyRegistered;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyService
{
    public function register($request)
    {
        DB::beginTransaction();
        $company = Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'invitation_code' => Str::random(100)
        ]);
        event(new CompanyRegistered($company->id, $request['name'], $request['email'], $request['password']));
        DB::commit();
        return $company ;
    }
}
