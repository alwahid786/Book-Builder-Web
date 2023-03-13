<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Register Function 
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'password' => 'required|min:8|confirmed',
            'image' => 'required|file',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = array_values($validator->errors()->messages());
            toastr()->error($messages[0][0]);
            return redirect()->back();
        }

        $UserData = [
            'name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'image' => $request->image,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ];
        $user = User::create($UserData);
        if ($user) {
            $UserData = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            auth()->attempt($UserData);
            $authUser = auth()->user();
            $authUser->token = $authUser->createToken('API Token')->accessToken;
            toastr()->success('Registration Successfull!');
            return view('pages.welcome');
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
        return redirect('/gratitude-story');
    }

    // Forget password Function 
    public function forget(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validator->fails()) {
            $messages = array_values($validator->errors()->messages());
            toastr()->error($messages[0][0]);
            return redirect()->back();
        }
        $otp = rand(1000, 9999);
        if (!User::where('email', $request->email)->update(['otp_code' => $otp])) {
            toastr()->error('Unable to process. Please try again.');
            return redirect()->back();
        }
        Mail::to($request->email)->send(new VerifyEmail($otp));
        Session::put('otpEmail', $request->email);
        return redirect('/verify-otp');
    }

    // Verification of OTP Code API 
    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp_code' => 'required'
        ]);
        if ($validator->fails()) {
            $messages = array_values($validator->errors()->messages());
            toastr()->error($messages[0][0]);
            return redirect()->back();
        }
        $email = Session::get('otpEmail');

        if (!User::where([['email', '=', $email], ['otp_code', '=', $request->otp_code]])->exists()) {
            toastr()->error('Invalid OTP Code');
            return redirect()->back();
        }
        return redirect('/reset-password');
    }

    // Update Password Function 
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            $messages = array_values($validator->errors()->messages());
            toastr()->error($messages[0][0]);
            return redirect()->back();
        }
        $email = Session::get('otpEmail');

        if (!User::where('email', $email)->update(['otp_code' => Null, 'password' => bcrypt($request->password)])) {
            toastr()->error('Unable to process. Please try again later.');
            return redirect()->back();
        }
        return redirect('/');
    }

    // logout Function 
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
