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
use Exception;


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

    public function outlineForm(Request $request)
    {
        foreach ($request->outlines as $value) {
            $outline = new Outline;
            $outline->user_id = $request->user_id;
            $outline->outline_name = $value;
            $outline->save();
        }
        return response()->json(['success' => 'true', 'message' => 'Outlines Added successfully.']);
    }

    public function coverArt()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.cover-art', compact('bookdata'));
    }

    public function coverArtForm(Request $request)
    {
        $data = $request->except('_token');
        if ($request->has('front_cover')) {
            try {
                $file = $request->file('front_cover');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path('/files'), $name);
                $fileNames = $name;
            } catch (Exception $e) {
                $message = $e->getMessage();
                return $this->failure($message);
            }
            $imageFront = url('public/files') . '/' . $fileNames;
            $data['front_cover'] = $imageFront;
        }
        if ($request->has('spine_cover')) {
            try {
                $file = $request->file('spine_cover');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path('/files'), $name);
                $fileNames = $name;
            } catch (Exception $e) {
                $message = $e->getMessage();
                return $this->failure($message);
            }
            $imageSpine = url('public/files') . '/' . $fileNames;
            $data['spine_cover'] = $imageSpine;

        }
        if ($request->has('back_cover')) {
            try {
                $file = $request->file('back_cover');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path('/files'), $name);
                $fileNames = $name;
            } catch (Exception $e) {
                $message = $e->getMessage();
                return $this->failure($message);
            }
            $imageBack = url('public/files') . '/' . $fileNames;
            $data['back_cover'] = $imageBack;

        }
        $data['img_status'] = 1;
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect()->back();
        }
    }
}
