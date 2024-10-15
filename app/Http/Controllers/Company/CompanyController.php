<?php

namespace App\Http\Controllers\Company;

use App\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanySignupRequest;
use App\Services\Company\CompanyService;

class CompanyController extends Controller
{
    use GeneralTrait ;
    private CompanyService $companyService ;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function register(CompanySignupRequest $request)
    {
        $data = [];
        try{
            $data = $this->companyService->register($request);
            return $this->sendSuccess($data);
        } catch(\Throwable $th){
            return $this->sendError($th->getMessage(), $th->getCode());
        }
    }
}
