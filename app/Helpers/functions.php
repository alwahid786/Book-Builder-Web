<?php

use App\Models\Book;
use App\Models\Outline;

function bookProgress()
{
    $sections = [
        'avatar' => false,
        'book_title' => false,
        'outline' => false,
        'cover_art' => false,
        'inside_cover' => false,
        'copy_right' => false,
        'praise' => false,
        'dedication' => false,
        'how_to_use' => false,
        'forword' => false,
        'table_of_content' => false,
        'conclusion' => false,
        'work_with_us' => false,
        'about' => false,
    ];

    $outlines = Outline::where('user_id', auth()->user()->id)->first();
    if(!empty($outlines)){
        $sections['outline'] = true;
    }
    $book_details = Book::where('user_id', auth()->user()->id)->first();
    if (!empty($book_details)) {
        if (!empty($book_details->avatar_fname)) {
            $sections['avatar'] = true;
        }

        if (!empty($book_details->book_title)) {
            $sections['book_title'] = true;
        }

        if (!empty($book_details->front_cover)) {
            $sections['cover_art'] = true;
        }
    }
    $count_true = count(array_filter($sections)); // count number of true values
    $total = count($sections); // count total elements
    $percentage =  round($count_true / $total * 100); // calculate percentage


    return [
        'percentage' => $percentage,
        'sections' => $sections
    ];
}

function outlines()
{
    $outlines = Outline::where('user_id', auth()->user()->id)->get(['id', 'outline_name']);
    return $outlines;
}
