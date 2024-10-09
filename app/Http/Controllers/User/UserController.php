<?php

namespace App\Http\Controllers\User;

use App\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserSignupRequest;
use App\Http\Services\User\UserService;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use GeneralTrait ;
    private UserService $userService ;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService ;
    }

    public function register(UserSignupRequest $request)
    {
        DB::beginTransaction();
        try{
            $data = $this->userService->register($request->validated());
            DB::commit();
            return $this->sendSuccess($data, 200);
        } catch (\Throwable $th)
        {
            $message = $th->getMessage();
            DB::rollBack();
            return $this->sendError($message, 404);
        }
    }
    public function login(UserLoginRequest $request)
    {
        try{
            $data = $this->userService->login($request->validated());
            return $this->sendSuccess($data, 200);
        } catch(\Throwable $th){
            return $this->sendError($th->getMessage(), $th->getCode());
        }
    }

}
