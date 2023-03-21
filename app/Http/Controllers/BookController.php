<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Outline;
use App\Models\Copyright;
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
        $outlines = Outline::where('user_id', auth()->user()->id)->get();
        $outlines = json_decode($outlines, true);
        $bookdata = json_decode($bookdata, true);
        $bookdata['outlines'] = $outlines;

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

    public function deleteOutline(Request $request)
    {
        $delete = Outline::where('id', $request->outline_id)->delete();
        return response()->json(['success' => true]);
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
            return redirect('inside-cover');
        }
    }

    public function insideCover()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.inside-cover', compact('bookdata'));
    }

    public function frontCoverForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/inside-cover');
        }
    }
    public function copyright()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $copyright = Copyright::where('user_id', auth()->user()->id)->first();
        $copyright = json_decode($copyright, true);
        $bookdata = json_decode($bookdata, true);
        $bookdata['copyright'] = $copyright;
        return view('pages.book.copyright', compact('bookdata'));
    }

    public function copyrightForm(Request $request)
    {
        $data = $request->except('_token');
        $copyrightData = Copyright::where('user_id', $request->user_id)->first();
        if ($copyrightData) {
            $copyright = $copyrightData->update($data);
            return redirect('/praise');
        } else {
            $copyright = new Copyright;
            $copyright->create($data);
            return redirect('/praise');
        }
    }
    public function praise()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.praise', compact('bookdata'));
    }

    public function praiseForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/dedication');
        }
    }
    public function dedication()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.dedication', compact('bookdata'));
    }

    public function dedicationForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/how-to-use');
        }
    }
    public function howToUse()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.how-to-use', compact('bookdata'));
    }

    public function howToUseForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/forward');
        }
    }
    public function Forward()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.forward', compact('bookdata'));
    }

    public function ForwardForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            $outlines = Outline::where('user_id', auth()->user()->id)->get(['id', 'outline_name']);
            return redirect('/content/%24' . $outlines[0]['id']);
        }
    }
    public function content($id)
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $outline = Outline::where('id', $id)->first();
        $outline = json_decode($outline, true);
        $bookdata = json_decode($bookdata, true);
        $bookdata['outline'] = $outline;
        return view('pages.book.content', compact('bookdata'));
    }

    public function contentForm(Request $request)
    {
        $outlineIds = Outline::where('user_id', $request->user_id)->get('id');
        $outlineIds = json_decode($outlineIds, true);
        $next_id = $this->getNextId($outlineIds, $request->outline_id);
        $outline = Outline::where('id', $request->outline_id)->update(['content' => $request->content]);
        if ($next_id) {
            return redirect('/content/%24' . $next_id);
        }
        return redirect('/conclusion');
    }
    function getNextId($array, $outline_id)
    {
        $index = -1;
        foreach ($array as $key => $value) {
            if ($value['id'] == $outline_id) {
                $index = $key;
                break;
            }
        }
        if ($index == -1 || $index == count($array) - 1) {
            return false;
        } else {
            return $array[$index + 1]['id'];
        }
    }
    public function conclusion()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.conclusion', compact('bookdata'));
    }

    public function conclusionForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/inside-cover');
        }
    }
    public function workWithUs()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.work-with-us', compact('bookdata'));
    }

    public function workWithUsForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/inside-cover');
        }
    }
    public function about()
    {
        $bookdata = Book::where('user_id', auth()->user()->id)->first();
        $bookdata = json_decode($bookdata, true);
        return view('pages.book.about', compact('bookdata'));
    }

    public function aboutForm(Request $request)
    {
        $data = $request->except('_token');
        $book = Book::where('user_id', $request->user_id)->update($data);
        if ($book) {
            return redirect('/inside-cover');
        }
    }
}
