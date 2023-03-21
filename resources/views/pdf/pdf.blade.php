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

        .divOutline{
            display: flex;
            align-items: baseline;
        }
    </style>
</head>

<body>
    <h1 class="text-center mt-3">{{$data['book_title']}}</h1>
    <h5 class="text-center" style="font-style:italic"> {{$data['book_title']}}</h5>
    <div class="coverImg mt-3">
        <img src="{{$data['front_cover']}}" alt="Front Cover Image">
    </div>
    <div class="mt-3 text-center">
        <h3>{{$data['avatar_fname']}} {{$data['avatar_lname']}}</h3>
        <p>{{$data['avatar_description']}}</p>
    </div>
    <div class="outlineDiv mx-5">
        <h2 class="mt-3">Table of Content:</h2>
        <hr class="mt-0">
        <?php $count = 1; ?>
        @foreach($data['outlines'] as $outline)
        <div class="divOutline">
            <div class="w-25 pl-3">
                <?php echo $count;
                $count++; ?>
            </div>
            <div class="w-75 text-center">
                {{$outline['outline_name']}}
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>