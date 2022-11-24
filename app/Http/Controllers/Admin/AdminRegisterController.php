<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\Interfaces\AdminServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class AdminRegisterController extends Controller
{
    public function registerUser(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:users',
            'phone.index.id'=>'required|numeric',
            'phone.number'=>'required|string',
        ]);
        $password = uniqid().time();
        $user = User::create([
            'email' => $request->email,
            'index_id' => $request['phone']['index']['id'],
            'phone_number' => $request['phone']['number'],
            'password' => bcrypt($password),
        ]);
        Mail::to($user->email)->send(new \App\Mail\RegistrationMail($user, $password));
        return $user->id;
    }
}
