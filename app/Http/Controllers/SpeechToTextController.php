<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeechToTextController extends Controller
{
    public function speechToText()
    {
        return view('pages.text_to_speech');
    }
}

?>
