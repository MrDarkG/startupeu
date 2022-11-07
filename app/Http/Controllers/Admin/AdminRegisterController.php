<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\Interfaces\AdminServiceInterface;


class AdminRegisterController extends Controller
{
    /**
     * @variable AdminServiceInterface
     */
    public AdminServiceInterface $adminServiceInterface;

    /**
     * AdminRegisterController constructor.
     * @param AdminServiceInterface $adminServiceInterface
     */
    public function __construct(
        AdminServiceInterface $adminServiceInterface
    ){
        $this->adminServiceInterface = $adminServiceInterface;
    }
    public function registerUser(UserRegistrationRequest $request){
        $this->adminServiceInterface->registerUser($request);
    }
}
