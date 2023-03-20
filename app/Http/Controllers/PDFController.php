<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Book;
use App\Models\User;

class PDFController extends Controller
{
    //

    public function createPDF()
    {
        $id = auth()->user()->id;
        $data = Book::where('user_id', $id)->first();
        $data = json_decode($data, true);
        $pdf = PDF::loadView('pdf.pdf', compact('data')); // load view and pass data

        return $pdf->download('pdf_file.pdf'); // download PDF file
    }
}
