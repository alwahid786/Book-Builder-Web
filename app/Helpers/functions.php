<?php

use App\Models\Book;
use App\Models\Outline;

function bookProgress($id=null)
{
    if($id == null){
        $id = auth()->user()->id;
    }
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

    $book_details = Book::where('user_id', $id)
        ->with(['outlines' => function ($query) {
            $query->select('id', 'outline_name', 'user_id', 'content', 'order');
            $query->orderBy('order');
        }, 'copyright'])
        ->first();
    if (!empty($book_details->outlines)) {

        $sub_outlines = ($book_details->outlines)->toArray();
        foreach ($sub_outlines as $sub_outline) {
            if (!empty($sub_outline['content'])) {
                $sections['sub_outline_' . $sub_outline['order']] = true;
            } else {
                $sections['sub_outline_' . $sub_outline['order']] = false;
            }
        }

        $notEmptyContentFields = array_filter($sub_outlines, function ($item) {
            return !empty($item['content']);
        });


        if (sizeof($notEmptyContentFields)) {
            $sections['table_of_content'] = true;
        }

        // Outline 
        if (sizeof($book_details->outlines)) {
            $sections['outline'] = true;
        }

        // copyright
        if (!empty($book_details->copyright)) {
            $sections['copy_right'] = true;
        }

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

            if (!empty($book_details->front_title)) {
                $sections['inside_cover'] = true;
            }

            if (!empty($book_details->praise)) {
                $sections['praise'] = true;
            }

            if (!empty($book_details->dedication)) {
                $sections['dedication'] = true;
            }

            if (!empty($book_details->how_to_use)) {
                $sections['how_to_use'] = true;
            }

            if (!empty($book_details->forward)) {
                $sections['forword'] = true;
            }

            if (!empty($book_details->conclusion)) {
                $sections['conclusion'] = true;
            }

            if (!empty($book_details->work_with_us)) {
                $sections['work_with_us'] = true;
            }

            if (!empty($book_details->about)) {
                $sections['about'] = true;
            }
        }
        $sub_outlines_percentage = 0;
        if (sizeof($notEmptyContentFields)) {
            $sub_outlines_percentage = round(count($notEmptyContentFields) / count($sub_outlines) * 50);
        }
        $sectionsWithoutContent = $sections;
        unset($sectionsWithoutContent['table_of_content']);
        $count_true = count(array_filter($sectionsWithoutContent)); // count number of true values
        // echo'<pre>';print_r($sectionsWithoutContent);exit;
        $total = count($sectionsWithoutContent); // count total elements
        $remaining_percentage = round($count_true / $total * 50); // calculate remaining percentage
        $percentage = $sub_outlines_percentage + $remaining_percentage;


        return [
            'percentage' => $percentage,
            'sections' => $sections
        ];
    }
    return [
        'percentage' => 0.0,
        'sections' => $sections
    ];
}

function outlines()
{
    $outlines = Outline::where('user_id', auth()->user()->id)->orderBy('order')->get();
    if (count($outlines) > 0) {
        return $outlines;
    }
    return [];
}
