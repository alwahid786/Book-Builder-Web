<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Realease;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Exception;


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
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = array_values($validator->errors()->messages());
            return response()->json(['success' => false, 'message' => $messages]);
        }
        // $image = $request->image;
        // if ($request->has('image')) {
        //     try {
        //         $file = $request->file('image');
        //         $name = time() . $file->getClientOriginalName();
        //         $directory = public_path('/files');
        //         if (!is_dir($directory)) {
        //             mkdir($directory, 777, true);
        //         }
        //         $file->move($directory, $name);
        //         $fileNames = $name;
        //     } catch (Exception $e) {
        //         $message = $e->getMessage();
        //         toastr()->error($message);
        //         return redirect()->back();
        //     }
        //     $image = url('public/files') . '/' . $fileNames;
        // }

        $UserData = [
            'name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
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
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'An error occured. Try again']);
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
            return redirect('/');
        }
        $authUser = auth()->user();
        $authUser->token = $authUser->createToken('API Token')->accessToken;
        $releaseCheck = Realease::where('user_id', $authUser->id)->first();
        if (empty($releaseCheck)) {
            return redirect('/release');
        }
        return redirect('/avatar');
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

    public function welcome()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('pages.welcome', compact('user'));
    }
    public function release()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('pages.release', compact('user'));
    }

    public function releaseForm(Request $request)
    {
        $release = Realease::create($request->except('_token'));
        if ($release) {
            return redirect('/welcome');
        }
        return redirect()->back();
    }
}
