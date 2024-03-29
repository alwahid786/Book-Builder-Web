<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            font-family: Arial, sans-serif;
        }

        .coverImg {
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .coverImg img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .divOutline {
            display: flex;
            align-items: baseline;
        }
    </style>
</head>

<body>
    <!-- Book Title Section  -->
    @if(isset($data['book_title']) && $data['book_title'] != '')
    <h1 class="text-center mt-3">{{$data['book_title']}}</h1>
    <h5 class="text-center" style="font-style:italic"> {{$data['book_subtitle']}}</h5>
    @endif
    <!-- Cover Art Section  -->
    @if(isset($data['front_cover']) && $data['front_cover'] != '')
    <div class="coverImg mt-3">
        <img src="{{$data['front_cover']}}" alt="Front Cover Image">
    </div>
    @endif
    <!-- Inside Cover Section  -->
    @if(isset($data['author_fname']) && !empty($data['author_fname']))
    <p class="text-center mt-2">By</p>
    <h3 class="text-center">{{$data['author_fname']}} {{$data['author_lname']}}</h3>
    @endif
    <!-- Avatar Section  -->
    @if(isset($data['avatar_fname']) && $data['avatar_fname'] != '')
    <div class="mt-3 text-center" style="page-break-before: always;">
        <h3>{{$data['avatar_fname']}} {{$data['avatar_lname']}}</h3>
        <p>{{$data['avatar_description']}}</p>
    </div>
    @endif
    <!-- Copyright Section  -->
    @if(isset($data['copyright']) && !empty($data['copyright']['content']))
    <div class="copyright-content" style="page-break-before: always;">
        <h3 class="text-center">Copyright</h3>
        {!! $data['copyright']['content'] !!}
    </div>
    @endif
    @if(isset($data['praise']) && !empty($data['praise']))
    <div class="praise-content" style="page-break-before: always;">
        <h3 class="text-center">What Others are Saying...</h3>
        {!! $data['praise'] !!}
    </div>
    @endif
    @if(isset($data['dedication']) && !empty($data['dedication']))
    <div class="dedication-content" style="page-break-before: always;">
        <h3 class="text-center">Dedication</h3>
        {!! $data['dedication'] !!}
    </div>
    @endif
    @if(isset($data['how_to_use']) && !empty($data['how_to_use']))
    <div class="how_to_use-content" style="page-break-before: always;">
        <h3 class="text-center">How To Use This Book</h3>
        {!! $data['how_to_use'] !!}
    </div>
    @endif
    @if(isset($data['forward']) && !empty($data['forward']))
    <div class="forward-content" style="page-break-before: always;">
        <h3 class="text-center">How To Use This Book</h3>
        {!! $data['forward'] !!}
    </div>
    @endif
    <!-- Outlines Section  -->
    @if(isset($data['outlines']) && !empty($data['outlines']))
    <div class="outlineDiv mx-5" style="page-break-before: always;">
        <h2 class="mt-3">Table of Contents:</h2>
        <hr class="mt-0">
        <table class="w-100">
            <tbody>
                <?php $count = 1; ?>
                @foreach($data['outlines'] as $outline)
                <tr>
                    <td class="w-100">{{$count}}</td>
                    <td class="w-100">{{$outline['outline_name']}}</td>
                </tr>
                <?php $count++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    <!-- Chapters Section  -->
    @if(isset($data['outlines']) && !empty($data['outlines']))
    @foreach($data['outlines'] as $outlineValue)
    @if($outlineValue['content'] != null)
    <div class="outlineDiv mx-3 style=" style="page-break-before: always;">
        <h2 class="my-3">{{$outlineValue['outline_name']}}</h2>
        <div class="chapter-content">
            {!! $outlineValue['content'] !!}
        </div>
    </div>
    @endif
    @endforeach
    @endif
    @if(isset($data['conclusion']) && !empty($data['conclusion']))
    <div class="conclusion-content" style="page-break-before: always;">
        <h3 class="text-center">Conclusion</h3>
        {!! $data['conclusion'] !!}
    </div>
    @endif
    @if(isset($data['work_with_us']) && !empty($data['work_with_us']))
    <div class="work-content" style="page-break-before: always;">
        <h3 class="text-center">Work With Us</h3>
        {!! $data['work_with_us'] !!}
    </div>
    @endif
    @if(isset($data['about']) && !empty($data['about']))
    <div class="about-content" style="page-break-before: always;">
        <h3 class="text-center">About Author</h3>
        {!! $data['about'] !!}

    </div>
    @endif



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>