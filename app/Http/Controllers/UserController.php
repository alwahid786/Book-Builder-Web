<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class UserController extends Controller
{
    public function allUsers(Request $request)
    {
        $users = User::all();
        $users = json_decode($users);
        return view('pages.admin.users', compact('users'));
    }

    public function userDetails(Request $request)
    {
        $id = base64_decode($request->id);
        $user = User::find($id);
        $data = bookProgress($id);
        $user['percentage'] = $data['percentage'];
        return view('pages.admin.user-details', compact('user'));
    }
}
