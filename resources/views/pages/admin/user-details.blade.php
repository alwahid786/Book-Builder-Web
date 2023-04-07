@extends('layouts.default')
@section('content')

<style media="screen">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 100vh;
        background: white;
        background-size: cover;
        background-position: center;
    }

    .side-bar {
        background: #6dabe4;
        backdrop-filter: blur(15px);
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: -250px;
        overflow-y: auto;

    }

    .side-bar::-webkit-scrollbar {
        width: 0px;
    }



    .side-bar.active {
        left: 0;
    }

    h1 {

        text-align: center;
        font-weight: 500;
        font-size: 25px;
        padding-bottom: 13px;
        font-family: sans-serif;
        letter-spacing: 2px;
    }

    .side-bar .menu {
        width: 100%;
        /* margin-top: 85px; */
    }

    .side-bar .menu .item {
        position: relative;
        cursor: pointer;
    }

    .side-bar .menu .item a {
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        display: block;
        padding: 5px 30px;
        line-height: 30px;
    }

    .side-bar .menu .item a:hover {
        background: #29649ad1;
        transition: 0.3s ease;
    }

    .side-bar .menu .item i {
        margin-right: 15px;
    }

    .side-bar .menu .item a .dropdown {
        position: absolute;
        right: 0;
        top: 12px;
        /* margin: 20px; */
        transition: 0.3s ease;
    }

    .side-bar .menu .item .sub-menu {
        background: #29649ad1;
        display: none;
    }

    .side-bar .menu .item .sub-menu a {
        padding-left: 80px;
    }

    .rotate {
        transform: rotate(90deg);
    }

    .close-btn {
        position: absolute;
        color: #fff;

        font-size: 23px;
        right: 0px;
        margin: 15px;
        cursor: pointer;
    }

    .menu-btn {
        position: absolute;
        color: rgb(0, 0, 0);
        font-size: 35px;
        margin: 25px;
        cursor: pointer;
    }

    .main {
        height: 100vh;
        overflow-y: scroll;
        margin-left: 251px;
        background-color: #e0e0e061;
        padding: 0px;
    }

    img {
        width: 100px;
        margin: 15px;
        /* border-radius: 50%; */
        margin-left: 70px;
        border: 3px solid #b4b8b9;
    }

    header {
        background: #33363a;
    }


    .navBar {
        height: 85px;
        background-color: #6dabe4;
        width: 100%;
        display: flex;
        align-items: flex-end;
        /* margin-left: 1px; */
    }

    .progressDiv {
        width: 90%;
    }

    .dropdownDiv {
        width: 10%;
    }

    input {
        border: none;
        border-radius: 10px;
        height: 40px;
    }

    textarea {
        border: none;
        border-radius: 10px;
        padding: 10px;
    }

    input:active {
        border: none;
        border-radius: 10px;
        height: 40px;
    }

    input:focus {
        border: none;
        border-radius: 10px;
        height: 40px;
    }

    .av_heading {
        color: #6dabe4;
    }

    button {
        background-color: #6dabe4;
        color: white;
        font-size: 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .pdfBtn {
        background-color: #6dabe4;
        color: white;
        font-size: 30px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        bottom: 20px;
        right: 20px;
        animation: float 2s ease-in-out infinite;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    @keyframes float {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .active-nav {
        background: #29649ad1;
    }

    .completed {
        width: 10px;
        background-color: lawngreen;
        position: absolute;
        right: 0;
    }

    /* table.dataTable {
        clear: both;
        margin-top: 35px !important;
        margin-bottom: 6px !important;
        max-width: none !important;
        border-collapse: separate !important;
        border-spacing: 0;
    } */

    #example_wrapper {
        margin-top: 50px !important;
    }

    label {
        position: inherit !important;
    }

    table {
        background-color: #fff !important;
        padding: 30px;
        border-radius: 10px;
    }

    input[type=search] {
        border-radius: 5px !important;
    }

    .userContent h5,
    .userContent .tent {
        color: #6dabe4;
        margin-bottom: 1rem;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">



@include('layouts.book-layout.navbar')
<section class="main">
    @include('layouts.book-layout.progress')
    <div class="content px-5 py-4">
        <h3 class="av_heading text-center">User Details</h3>
        <div class="d-flex align-items-baseline mt-5 userContent">
            <div class="w-25">
                <p>Name:</p>
                <p>Joining Date:</p>
                <p>Email:</p>
                <p>Contact:</p>
            </div>
            <div class="w-75">
                <h5>{{$user->name}} {{$user->l_name}}</h5>
                <h5>{{date('d M, Y', strtotime($user->created_at))}}</h5>
                <h5>{{$user->email}}</h5>
                <h5>{{$user->phone}}</h5>
            </div>
        </div>
        <hr>

        <div class="d-flex align-items-baseline mt-5 userContent">
            <div class="w-25">
                <p>Book Progress:</p>
                <p>View Book:</p>
            </div>
            <div class="w-75">
                <div class="tent progress " style="height: 18px;">
                    <div class="progress-bar @if($user['percentage']<1) text-secondary @endif" role="progressbar" aria-valuenow="{{$user['percentage']}}" aria-valuemin="0" aria-valuemax="100" style="width:<?= $user['percentage'] ?>%;height: 18px; background-color:#1b961b">
                        {{$user['percentage']}}%
                    </div>
                </div>
                @if($user['percentage'] > 0)
                <a target="_blank" href="{{route('createPDF', ['id'=>$user->id])}}" class="text">Go To {{$user->name}}'s Book</a>
                @else
                <div class="text-center text-danger">
                    {{$user->name}} has not started a book Yet.
                </div>
                @endif
            </div>
        </div>
        <hr>
        <h4 class="av_heading text-center">Gratitude Story</h4>
        <div class="gratitude mb-3">
            @if($user->gratitude != null)
            {!! $user->gratitude !!}
            @else
            <div class="text-center text-danger">
                {{$user->name}} has not added his Gratitude Story Yet.
            </div>
            @endif
        </div>
        <hr>
        <h4 class="av_heading text-center">Romance Your Cutomers Story</h4>
        <div class="romance mb-3">
            @if($user->romance != null)
            {!! $user->romance !!}
            @else
            <div class="text-center text-danger">
                {{$user->name}} has not added his Romance Your Customers Story Yet.
            </div>
            @endif
        </div>

    </div>

</section>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //jquery for toggle sub menus
        $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });

        //jquery for expand and collapse the sidebar
        $('.side-bar').addClass('active');
        $('.menu-btn').click(function() {
            $('.menu-btn').css("visibility", "hidden");
        });

        $('.close-btn').click(function() {
            $('.side-bar').removeClass('active');
            $('.menu-btn').css("visibility", "visible");
        });

    });
</script>
<script>
    $('.menu .item:nth-of-type(8) a').addClass('active-nav');
</script>


@endsection