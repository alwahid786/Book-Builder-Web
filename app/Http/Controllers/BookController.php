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
use Illuminate\Support\Facades\File;


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
        $outlines = Outline::where('user_id', auth()->user()->id)->orderBy('order')->get();;
        $outlines = json_decode($outlines, true);
        $bookdata = json_decode($bookdata, true);
        $bookdata['outlines'] = $outlines;

        return view('pages.book.outline', compact('bookdata'));
    }

    public function outlineForm(Request $request)
    {
        dd($request->all());
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
                $directory = public_path('/files');
                if (!is_dir($directory)) {
                    mkdir($directory, 777, true);
                }
                $file->move($directory, $name);
                $fileNames = $name;
            } catch (Exception $e) {
                $message = $e->getMessage();
                toastr()->error($message);
                return redirect()->back();
            }
            $imageFront = url('public/files') . '/' . $fileNames;
            $data['front_cover'] = $imageFront;
        }
        if ($request->has('spine_cover')) {
            try {
                $file = $request->file('spine_cover');
                $name = time() . $file->getClientOriginalName();
                $directory = public_path('/files');
                if (!is_dir($directory)) {
                    mkdir($directory, 777, true);
                }
                $file->move($directory, $name);
                $fileNames = $name;
            } catch (Exception $e) {
                $message = $e->getMessage();
                toastr()->error($message);
                return redirect()->back();
            }
            $imageSpine = url('public/files') . '/' . $fileNames;
            $data['spine_cover'] = $imageSpine;
        }
        if ($request->has('back_cover')) {
            try {
                $file = $request->file('back_cover');
                $name = time() . $file->getClientOriginalName();
                $directory = public_path('/files');
                if (!is_dir($directory)) {
                    mkdir($directory, 777, true);
                }
                $file->move($directory, $name);
                $fileNames = $name;
            } catch (Exception $e) {
                $message = $e->getMessage();
                toastr()->error($message);
                return redirect()->back();
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
            return redirect('/copyright');
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

        $data['user_id'] = auth()->user()->id;
        Copyright::updateOrCreate(['user_id' => auth()->user()->id], $data);
        return redirect('/praise');
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
            if (!sizeof($outlines)) {
                return redirect('/outline');
            }
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
            return redirect('/work-with-us');
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
            return redirect('/about');
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
            session()->flash('open_modal', true);
            return redirect('/congratulations');
        }
    }

    public function updateGratitude(Request $request)
    {
        $book = User::where('id', auth()->user()->id)->update(['gratitude' => $request->gratitude]);
        if ($book) {
            return response()->json(['success', true]);
        }
        return response()->json(['success', false]);
    }
    public function updateRomance(Request $request)
    {
        $book = User::where('id', auth()->user()->id)->update(['romance' => $request->gratitude]);
        if ($book) {
            return response()->json(['success', true]);
        }
        return response()->json(['success', false]);
    }

    public function uploadFile(Request $request)
    {
        // dd($request->all());
        // Get the uploaded file.
        $file = $request->file('upload');
        // Define the upload directory.
        $uploadPath = public_path('/uploads');
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 777, true);
        }

        // Generate a unique filename for the uploaded file.
        $filename = uniqid() . '-' . $file->getClientOriginalName();

        // Move the uploaded file to the upload directory.
        $file->move($uploadPath, $filename);

        // Return the URL of the uploaded file to CKEditor.
        return response()->json([
            'url' => public_path('/uploads/' . $filename)
        ]);
    }
}
