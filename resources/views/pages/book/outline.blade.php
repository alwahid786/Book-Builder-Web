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
        border-radius: 50%;
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

    .outline {
        background-color: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 5px 5px 5px 5px solid gray;
        margin-top: 20px;
    }

    .outlineChapter {
        font-size: 20px;
        font-weight: 500;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>



@include('layouts.book-layout.navbar')
<section class="main">
    @include('layouts.book-layout.progress')
    <div class="content px-5 py-4">
        <h3 class="av_heading text-center">Add Outline</h3>
        <div class="d-flex justify-content-between align-items-end">
            <div class="input-group w-100 mx-2">
                <span class="text-secondary mb-2">Outline Title</span>
                <input type="text" name="av_f_name" id="outline_input">
                <input type="hidden" name="user_id" data-class="avatar" id="user_id" value="<?php echo  $bookdata['user_id'] ?? '' ?>">
            </div>
            <button id="addOutline" class="px-3 py-1 w-25"><i class="fas fa-plus mr-2"></i>Add</button>
        </div>
        <div class=" mx-2 mt-3 d-flex justify-content-between align-items-center">
            <a href="{{url('/book-title')}}">
                <button type="button" class="px-3 py-1"><i class="fas fa-arrow-left mr-2"></i>Previous</button></a>
            <button id="save" class="px-3 py-1"><i class="fas fa-save mr-2"></i>Save</button>
        </div>
        <div class="outline mx-2">
            <h4 class="av_heading ">Outline</h4>
            <hr class="mt-0">
            <div class="">
                <table class="w-100 mb-5">
                    <tbody class="outline-content">
                        <?php $count = 0; ?>
                        @if(isset($bookdata['outlines']) && !empty($bookdata['outlines']))
                        @foreach($bookdata['outlines'] as $outline)
                        <?php $count++ ?>
                        <tr draggable='true' ondragstart='start()' ondragover='dragover()'>
                            <td class="w-25 av_heading py-2" draggable="false">{{$count}}</td>
                            <td class="w-50 text-center text-secondary outlineChapter py-2" style="cursor: all-scroll;" data-id="{{$outline['id']}}" data-name="{{$outline['outline_name']}}">
                                {{$outline['outline_name']}}
                            </td>
                            <td class="w-25 text-right py-2">
                                <button class="btn-danger px-2 removeOutlineData" data-id="{{$outline['id']}}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        <input type="hidden" class="outlinePositions" name="outlinePositions" value="">
                        @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <a target="_blank" href="{{route('createPDF')}}">
        <button class="p-2 pdfBtn"><i class="fas fa-book"></i></button>
    </a>
</section>


<script type="text/javascript">
    function start() {
        row = event.target;
    }

    function dragover() {
        var e = event;
        e.preventDefault();

        let children = Array.from(e.target.parentNode.parentNode.children);
        let currentIndex = children.indexOf(row);
        let targetIndex = children.indexOf(e.target.parentNode);
        if (targetIndex > currentIndex) {
            e.target.parentNode.after(row);
        } else if (targetIndex < currentIndex) {
            e.target.parentNode.before(row);
        }

        // Update outline positions
        let positions = [];
        let outlines = document.querySelectorAll('.outlineChapter');
        outlines.forEach(outline => {
            let id = outline.dataset.id;
            let name = outline.dataset.name;
            let object = {
                outline_name: name,
                id: id
            }
            positions.push(object);
        });
        let positionInput = document.querySelector('.outlinePositions');
        positionInput.value = positions.join(',');
        console.log(positions);

        const tableRows = document.querySelectorAll('.outline-content tr');
        // Loop through the rows and update the count in the first td
        tableRows.forEach((row, index) => {
            const countCell = row.querySelector('.av_heading');
            if (countCell) {
                countCell.textContent = index + 1;
            }
        });
    }

    $(document).ready(function() {
        var outlines = [];
        var index = 0;
        var count = @json($count);
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

        $('#addOutline').click(function() {
            addOutline();
        });
        $("#outline_input").keyup(function(event) {
            if (event.which === 13) {
                addOutline();
            }
        });

        function addOutline() {
            var name = $("#outline_input").val();
            $("#outline_input").css('border', '1px solid red');
            if ($("#outline_input").val() == '') {
                swal({
                    title: "Input Error",
                    text: "You must add outline name to add in book",
                    icon: "error",
                });
            } else {
                $("#outline_input").css('border', 'red');
                count++;

                let div = `<tr  draggable='true' ondragstart='start()' ondragover='dragover()'>
                    <td class="w-25 av_heading py-2">${count}</td>
                    <td class="w-50 text-center text-secondary outlineChapter py-2" data-id="new" data-name="${name}" style="cursor: all-scroll;">
                        ${name}
                    </td>
                    <td class="w-25 text-right py-2">
                        <button class="btn-danger px-2 removeOutlineData" data-id="${index}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>`;
                $('.outline-content').append(div);
                outlines.push($("#outline_input").val());
                index++;
                $("#outline_input").val('');
            }
        }

        $(document).on('click', '.removeOutline', function() {
            let indexNo = $(this).attr('data-id');
            $(this).parent().remove();
            outlines.splice(indexNo, 1);

        });

        var row;

        function start() {
            row = event.target;
        }

        function dragover() {
            var e = event;
            e.preventDefault();

            let children = Array.from(e.target.parentNode.parentNode.children);
            if (children.indexOf(e.target.parentNode) > children.indexOf(row))
                e.target.parentNode.after(row);
            else
                e.target.parentNode.before(row);
        }

        // Ajax Call for Outline 
        $('#save').on('click', function(e) {
            console.log($('.outlinePositions').val());
            // if (positions.length > 0) {
            //     var dataArray = {
            //         outlines: outlines,
            //         positions: positions,
            //         user_id: $("#user_id").val(),
            //     }
            // } else {
            //     var dataArray = {
            //         outlines: outlines,
            //         user_id: $("#user_id").val(),
            //     }
            // }
            var sequenceOfOutlines = [];
            const tableRows = document.querySelectorAll('.outline-content tr');
            // Loop through the rows and update the count in the first td
            tableRows.forEach((row, index) => {
                const order_no = ((row.querySelector('.av_heading')).textContent).trim();
                const heading = ((row.querySelector('.outlineChapter')).textContent).trim();
                sequenceOfOutlines.push({
                    order_no: order_no,
                    heading: heading
                });
            });
            if (sequenceOfOutlines.length < 1 ) {
                swal({
                    title: "Input Error",
                    text: "You must add atleast 1 outline name to add in book",
                    icon: "error",
                });
                return;
            }


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{route('outlineDetail')}}`,
                type: "POST",
                data: {
                    outlines: outlines,
                    user_id: $("#user_id").val(),
                    sequenceOfOutlines: sequenceOfOutlines
                },
                cache: false,
                success: function(dataResult) {
                    window.location.href = `{{url('/cover-art')}}`;
                },
                error: function(jqXHR, exception) {
                    console.log(jqXHR.responseJSON.message);
                }
            });
        });

        $(document).on('click', '.removeOutlineData', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{route('deleteOutline')}}`,
                type: "POST",
                data: {
                    outline_id: id,
                },
                cache: false,
                success: function(dataResult) {
                    window.location.reload();
                },
                error: function(jqXHR, exception) {
                    console.log(jqXHR.responseJSON.message);
                }
            });
        })

    });
</script>
<script>
    $('.menu .item:nth-of-type(10) a').addClass('active-nav');
</script>
@endsection