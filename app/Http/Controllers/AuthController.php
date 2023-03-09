<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    // Register Function 
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string',
            'password' => 'required|min:8|confirmed',
            'image' => 'required|file',
        ]);
        if ($validator->fails()) {
            $messages = array_values($validator->errors()->messages());
            toastr()->error($messages[0][0]);
            return redirect()->back();
        }

        $UserData = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'password' => bcrypt($request->password)
        ];
        $user = User::create($UserData);
        if ($user) {
            toastr()->success('Registration Successfull!');
            return redirect('/');
        }
        toastr()->error('An error occured. Try again');
        return redirect()->back();
    }

    // Login Function 
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = array_values($validator->errors()->messages());
            toastr()->error($messages[0][0]);
            return redirect()->back();
        }
        $UserData = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (!auth()->attempt($UserData)) {
            toastr()->error('Try again. Wrong password.Try again or click forget password to reset your password.');
            return redirect()->back();
        }
        $authUser = auth()->user();
        $authUser->token = $authUser->createToken('API Token')->accessToken;
        return $this->sendResponse($authUser, 'Login Successful!');
    }
}
