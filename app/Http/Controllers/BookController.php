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
    public function avatar()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.avatar', compact('bookdata'));
    }
    // Avatar Form Function
    public function avatarForm(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $book = Book::create($data);
        if ($book) {
            return redirect('/book-title')->with('activeNav', 2);
        }
    }
}
