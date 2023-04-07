<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Book;
use App\Models\Outline;
use App\Models\User;
use App\Models\Copyright;

class PDFController extends Controller
{
    //

    public function createPDF(Request $request)
    {
        if (isset($request->id)) {
            $id = $request->id;
        } else {
            $id = auth()->user()->id;
        }
        $data = Book::where('user_id', $id)->first();
        $outlines = Outline::where('user_id', auth()->user()->id)->orderBy('order')->get();
        $copyright = Copyright::where('user_id', auth()->user()->id)->first();
        if (!empty($copyright)) {
            $copyright = json_decode($copyright, true);
            $data['copyright'] = $copyright;
        }
        if (count($outlines) > 0) {
            $outlines = json_decode($outlines, true);
            $data['outlines'] = $outlines;
        }

        $data = json_decode($data, true);
        $pdf = PDF::loadView('pdf.pdf', compact('data')); // load view and pass data
        $pdf->setPaper([0, 0, 500, 800], 'portrait');
        // Set the response content-type to PDF
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename=' . $data['book_title'] ?? 'book' . '".pdf"'
        ];

        // Return the rendered PDF in a new tab
        return response($pdf->stream(), 200, $headers);

        // Save the PDF to a temporary file
        // $pdf_path = public_path('files/' . $data['book_title'] ?? 'book' . '.pdf');
        // file_put_contents($pdf_path, $pdf->output());

        // // Convert the PDF to a DOC file using Unoconv
        // $doc_path = public_path('files/' . $data['book_title'] ?? 'book' . '.doc');
        // exec("unoconv -f doc --stdout --charset=utf-8 $pdf_path > $doc_path");
        // rename("$pdf_path", "$doc_path");

        // // Download the converted file
        // return response()->download("$doc_path")->deleteFileAfterSend(true);
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
