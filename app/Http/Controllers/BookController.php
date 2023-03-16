<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // Avatar Form Function
    public function avatar(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::create($data);
        if ($book) {
            return redirect('/book-title')->with('activeNav', 2);
        }
    }
}
