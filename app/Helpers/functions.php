<?php

use App\Models\Book;
use App\Models\Outline;

function bookProgress()
{
    $sections = [
        'avatar' => true,
        'book_title' => true,
        'outline' => true,
        'cover_art' => true,
        'inside_cover' => true,
        'copy_right' => true,
        'praise' => true,
        'dedication' => true,
        'how_to_use' => true,
        'forword' => true,
        'table_of_content' => true,
        'conclusion' => true,
        'work_with_us' => true,
        'about' => true,
    ];

    // $outlines = Outline::where('user_id', auth()->user()->id)->first();
    // if(!empty($outlines)){
    //     $sections['outline'] = true;
    // }
    // $book_details = Book::where('user_id', auth()->user()->id)->first();
    // if (!empty($book_details)) {
    //     if (!empty($book_details->avatar_fname)) {
    //         $sections['avatar'] = true;
    //     }

    //     if (!empty($book_details->book_title)) {
    //         $sections['book_title'] = true;
    //     }

    //     if (!empty($book_details->front_cover)) {
    //         $sections['cover_art'] = true;
    //     }
    // }
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
