<?php
namespace App\Interfaces;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Resources\UserRegistrationResource;

interface AdminServiceInterface
{
    function registerUser(UserRegistrationRequest $request) : UserRegistrationResource;
}
