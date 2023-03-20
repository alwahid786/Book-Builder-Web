<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Outline;
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
        if ($request->user_id == '') {
            $data['user_id'] = auth()->user()->id;
            $book = Book::create($data);
            if ($book) {
                return redirect('/book-title')->with('activeNav', 2);
            }
        } else {
            $book = Book::where('user_id', $request->user_id)->update($data);
            if ($book) {
                return redirect('/book-title')->with('activeNav', 2);
            }
        }
    }

    public function bookTitle()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.book-title', compact('bookdata'));
    }

    public function bookTitleForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/outline');
        }
    }
    public function outline()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.outline', compact('bookdata'));
    }
}
