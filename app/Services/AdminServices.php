<?php

namespace App\Services;
use App\Http\Requests\UserRegistrationRequest;
use App\Interfaces\AdminServiceInterface;
use App\Models\User;
use App\Http\Resources\UserRegistrationResource;
use Illuminate\Support\Facades\Mail;

class AdminServices implements AdminServiceInterface
{
    function registerUser(UserRegistrationRequest $request) : UserRegistrationResource
    {
        $password = uniqid().time();
        $user = User::create([
            'email' => $request->email,
            'index_id' => $request['phone']['index']['code'],
            'phone_number' => $request['phone']['number'],
            'password' => bcrypt($password),
        ]);
        Mail::to($user->email)->send(new \App\Mail\RegistrationMail($user, $password));
        return new UserRegistrationResource($user);
    }
}
