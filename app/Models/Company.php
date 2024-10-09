<?php

namespace App\Models;

use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


// Here there is two ways to define a global scope:
// the first way is this, by making booted function and add the scope to it:

#[ScopedBy(CompanyScope::class)]

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'email',
        'password',
        'invitation_code'
    ];

    /*protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }*/
}
