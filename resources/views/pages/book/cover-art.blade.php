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

    .hero-section-upload {
        color: #6dabe4;
        background: #FFF;
        border: 1px solid #6dabe4;
        border-radius: 7px;
        font-size: 1rem;
        font-weight: 600;
        /* margin: 0 20px; */
        cursor: pointer;
        /* width: 100%; */
        /* max-width: 204px; */
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-section-upload:hover {
        color: white;
        background: #6dabe4;
    }

    .img-preview img {
        width: 150px;
        height: 150px;
        border-radius: 10px;
        border: 1px solid #6dabe4;
        margin-left: 0px;
        object-fit: cover;
    }

    label {
        position: relative;
        top: 0;
        right: 0;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>



@include('layouts.book-layout.navbar')
<section class="main">
    @include('layouts.book-layout.progress')
    <div class="content px-5 py-4">
        <h3 class="av_heading text-center">Add Cover Art</h3>
        <div class="row mt-4">
            <div class="col-4">
                <div id="img-preview" class="img-preview text-center">
                    <img src="https://png.pngtree.com/png-vector/20190508/ourmid/pngtree-upload-cloud-vector-icon-png-image_1027251.jpg" alt="image">
                </div>
                <div class="text-center">
                    <label class="hero-section-upload my-4 w-75 mx-auto"> Upload Front Cover
                        <input type="file" name="profile_img" class="d-none" id="profile-img" size="60">
                    </label>
                </div>
            </div>
            <div class="col-4">
                <div id="img-preview2" class="img-preview text-center">
                    <img src="https://png.pngtree.com/png-vector/20190508/ourmid/pngtree-upload-cloud-vector-icon-png-image_1027251.jpg" alt="image">
                </div>
                <div class="text-center">
                    <label class="hero-section-upload my-4 w-75 mx-auto"> Upload Spine Cover
                        <input type="file" name="profile_img" class="d-none" id="profile-img2" size="60">
                    </label>
                </div>
            </div>
            <div class="col-4">
                <div id="img-preview3" class="img-preview text-center">
                    <img src="https://png.pngtree.com/png-vector/20190508/ourmid/pngtree-upload-cloud-vector-icon-png-image_1027251.jpg" alt="image">
                </div>
                <div class="text-center">
                    <label class="hero-section-upload my-4 w-75 mx-auto"> Upload Back Cover
                        <input type="file" name="profile_img" class="d-none" id="profile-img3" size="60">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-5">

                <div class=" mx-2 mt-3 d-flex justify-content-between align-items-center">
                    <a href="{{url('/book-title')}}">
                        <button type="button" class="px-3 py-1"><i class="fas fa-arrow-left mr-2"></i>Previous</button></a>
                    <button type="submit" id="avatar" class="px-3 py-1"><i class="fas fa-save mr-2"></i>Save</button>
                </div>
            </div>
        </div>
    </div>
    <button class="p-2 pdfBtn"><i class="fas fa-book"></i></button>
</section>


<script type="text/javascript">
    $(document).ready(function() {
        var outlines = [];
        var index = 0;
        var count = 1;
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
            var name = $("#outline_input").val();
            if ($("#outline_input").val() == '') {
                swal({
                    title: "Input Error",
                    text: "You must add outline name to add in book",
                    icon: "error",
                });
            } else {
                let div = `<div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="av_heading ">${count}</h6>
                    <h5 class="text-secondary">${name}</h5>
                    <button class="btn-danger px-2 removeOutline" data-id="${index}"><i class="fas fa-trash-alt"></i></button>
                </div>`;
                $('.outline-content').append(div);
                outlines.push($("#outline_input").val());
                index++;
                count++;
                if (outlines.length > 0) {
                    $(".outline").removeClass('d-none');
                } else {
                    $(".outline").addClass('d-none');
                }
                $("#outline_input").val('');
                console.log(outlines)
            }
        });

        $(document).on('click', '.removeOutline', function() {
            let indexNo = $(this).attr('data-id');
            $(this).parent().remove();
            outlines.splice(indexNo, 1);
            if (outlines.length > 0) {
                $(".outline").removeClass('d-none');
            } else {
                $(".outline").addClass('d-none');
            }

        });

        const chooseFile = document.getElementById("profile-img");
        const imgPreview = document.getElementById("img-preview");
        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    // imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img class="cursorPointer_s objectFitCover_s" src="' + this.result +
                        '" />';
                });
            }
        }
        const chooseFile2 = document.getElementById("profile-img2");
        const imgPreview2 = document.getElementById("img-preview2");
        chooseFile2.addEventListener("change", function() {
            getImgData2();
        });

        function getImgData2() {
            const files2 = chooseFile2.files[0];
            if (files2) {
                const fileReader2 = new FileReader();
                fileReader2.readAsDataURL(files2);
                fileReader2.addEventListener("load", function() {
                    // imgPreview.style.display = "block";
                    imgPreview2.innerHTML = '<img class="cursorPointer_s objectFitCover_s" src="' + this.result +
                        '" />';
                });
            }
        }
        const chooseFile3 = document.getElementById("profile-img3");
        const imgPreview3 = document.getElementById("img-preview3");
        chooseFile3.addEventListener("change", function() {
            getImgData3();
        });

        function getImgData3() {
            const files3 = chooseFile3.files[0];
            if (files3) {
                const fileReader3 = new FileReader();
                fileReader3.readAsDataURL(files3);
                fileReader3.addEventListener("load", function() {
                    // imgPreview.style.display = "block";
                    imgPreview3.innerHTML = '<img class="cursorPointer_s objectFitCover_s" src="' + this.result +
                        '" />';
                });
            }
        }

    });
</script>
<script>
    $('.menu .item:nth-of-type(5) a').addClass('active-nav');
</script>
@endsection