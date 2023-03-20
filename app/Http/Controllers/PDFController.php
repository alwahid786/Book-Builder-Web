<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Book;
use App\Models\Outline;
use App\Models\User;

class PDFController extends Controller
{
    //

    public function createPDF()
    {
        $id = auth()->user()->id;
        $data = Book::where('user_id', $id)->first();
        $outlines = Outline::where('user_id', auth()->user()->id)->get();
        $outlines = json_decode($outlines, true);
        $data = json_decode($data, true);
        $data['outlines'] = $outlines;

        $pdf = PDF::loadView('pdf.pdf', compact('data')); // load view and pass data
        $pdf->setPaper('a4', 'portrait');

        // Set the response content-type to PDF
        $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="mypdf.pdf"'
            ];

        // Return the rendered PDF in a new tab
        return response($pdf->stream(), 200, $headers);
    }
    public function pdf()
    {
        $id = auth()->user()->id;
        $data = Book::where('user_id', $id)->first();
        $outlines = Outline::where('user_id', auth()->user()->id)->get();
        $outlines = json_decode($outlines, true);
        $data = json_decode($data, true);
        $data['outlines'] = $outlines;
        return view('pdf.pdf', compact('data'));
    }
}
