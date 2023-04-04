@extends('layouts.default')
@section('content')
<style>
    iframe {
        border-radius: 20px !important;
        border: 2px solid #6dabe4;
    }

    button {
        background-color: #6dabe4;
        color: white;
        font-size: 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .leftDiv {
        /* min-height: 100%; */
        width: 100%;
        background-color: white;
        height: 100vh;
        overflow: hidden;
    }

    .rightDiv {
        height: 100vh;
        overflow-y: scroll;
    }

    .imgDiv {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
    }

    .imgDiv img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .progress {
        height: 10px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .progressComplete {
        width: 100%;
        height: 100%;
        background-color: #6dabe4;
    }

    .progressEmpty {
        width: 100%;
        height: 100%;
        background-color: white;
    }

    .dot {
        width: 10px;
        height: 100%;
        border-radius: 50%;
        background-color: darkblue;
    }

    .red {
        color: red !important;
    }

    /* For Chrome, Safari, and Opera */
    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        background-color: #fff;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #6dabe4;
        border-radius: 10px;
    }

    .logout {
        position: absolute;
        bottom: 0;
        left: 0;
        border-radius: 0px;
    }

    .content-div input {
        width: 30%;
        margin-right: 10px;
    }

    canvas {
        border: 2px solid #6dabe4;
        border-radius: 10px;
        background-color: #e2f3f669;
    }

    .g-recaptcha iframe {
        border: none !important;
        border-radius: 0px !important;
    }
</style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<section style="background: #e2f3f669">
    <!-- <div class="container px-5 py-3 my-3">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h2>Welcome To 3X Author</h2>
                    <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius fugit sint laborum recusandae eaque voluptatibus sequi nobis dolore eos nesciunt nihil voluptatum nam ea vitae accusamus nisi iste modi odit consequatur nemo, consectetur tenetur aperiam! Error ipsam quisquam exercitationem at incidunt quam consequatur? Numquam voluptatem ea fuga quisquam laborum provident sequi cupiditate qui! Vel, tempora facilis. Maxime, omnis! Temporibus expedita optio libero repellat, tempore illo consectetur perferendis, aut natus cum ab id sapiente asperiores ipsam nam ullam ut perspiciatis harum voluptas facere! Amet, consectetur aperiam? Provident accusantium exercitationem rerum suscipit! Nam inventore sapiente nihil ratione, ducimus ea dolorem vitae dolores!</p>
                </div>
            </div>
            <div class="col-12">
                <iframe width="100%" height="345" src="https://www.youtube.com/embed/ptssvF8NYnI">
                </iframe>
            </div>
            <div class="col-12 mt-3">
                <div class="text-right">
                    <a href="{{url('/storytelling')}}">
                        <button class="px-5 py-2">
                            Story Telling
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 pl-0">
                <div class="leftDiv p-4 text-center position-relative">
                    <div class="imgDiv mx-auto">
                        @if(auth()->user()->image != null)
                        <img src="{{auth()->user()->image}}" alt="">
                        @else
                        <img src="{{asset('assets/images/logo.jpeg')}}" alt="">
                        @endif
                    </div>
                    <h3 class="mt-3">{{auth()->user()->name ?? 'Wahid'}}</h3>
                    <hr>
                    <div class="d-flex align-items-baseline justify-content-start pl-3">
                        <i class="zmdi zmdi-email"></i>
                        <p class="ml-3">{{auth()->user()->email ?? 'wahid.kodex@gmail.com'}}</p>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-start pl-3">
                        <i class="zmdi zmdi-phone"></i>
                        <p class="ml-3">{{auth()->user()->phone ?? '123456'}}</p>
                    </div>
                    <a href="{{url('/logout')}}">
                        <button class="logout py-2 mb-3 w-100">Logout</button>
                    </a>
                </div>
            </div>
            <div class="col-9">
                <div class="rightDiv">
                    <div class="container px-5 py-3 my-3">
                        <h2 class="text-center">Release</h2>
                        <div class="content-div mt-5">
                            <form action="{{route('releaseForm')}}" method="post" enctype="multipart/form-data" id="releaseForm">
                                @csrf
                                <div class="d-flex align-items-end my-3">
                                    <input type="text" name="first_name" placeholder="Enter First Name" value="{{auth()->user()->name}}">
                                    <input type="text" name="last_name" placeholder="Enter Last Name" value="{{auth()->user()->l_name}}">
                                    <p class="m-0"> hereinafter known as <b>USER</b>.</p>
                                </div>
                                <input type="date" name="date" id="" class="mt-4" value="<?php echo date('Y-m-d') ?>">
                                <p class="mt-5">The above-named <b>USER</b> does hereby irrevocably consent to the recording and distribution of reproduction(s) of the <b>USER</b>'s image, voice and performance as part of the program titled Book Builder, 3X Author Boot Camp, &/or One Day Author, etc. (herein referred to as the "<b>Program</b>").</p>
                                <p><b>USER</b> does hereby acknowledge that Don Williams, Don Williams Global, Alliance PDMS, LLC and all other Don Williams Companies is the sole owner of all rights in and to the <b>Program</b>, and the recording(s) thereof, as “works made for hire” pursuant to 17 USC §101, et.seq., for all purposes; and that Don Williams, Don Williams Global, Alliance PDMS, LLC and all other Don Williams Companies has the unfettered right, among other things, to use, exploit and distribute the <b>Program</b>, and <b>USER</b> performance as embodied therein in any and all media or formats, throughout the world, in perpetuity. Any materials relating to the production and distribution of the Program (“Materials”) become the property of Don Williams, Don Williams Global, Alliance PDMS, LLC and all other Don Williams Companies, and Don Williams, Don Williams Global, Alliance PDMS, LLC and all other Don Williams Companies shall have the sole and exclusive right to use, exploit and distribute such Materials, throughout the world, in perpetuity.</p>
                                <p>Nothing contained in this <b>USER</b> Release shall be construed to obligate Don Williams, Don Williams Global, Alliance PDMS, LLC and all other Don Williams Companies to use or exploit any of the rights granted or acquired by Don Williams, Don Williams Global, Alliance PDMS, LLC and all other Don Williams Companies, or to make, sell, license, distribute or otherwise exploit the <b>Program</b> or Materials whatsoever.</p>
                                <p><b>USER</b> understands and agrees that he/she shall receive no compensation for appearances on and participation in the <b>Program</b>.</p>
                                <p><b>USER</b>'s name and likeness may be used in advertising and promotional material for the <b>Program</b>, but not as an endorsement of any product or service.</p>
                                <p><b>USER</b> hereby releases and discharges Don Williams, Don Williams Global, Alliance PDMS, LLC and all other Don Williams Companies from any and all liability arising out of or in connection with the making, producing, reproducing, processing, exhibiting, distributing, publishing, transmitting by any means or otherwise using the above-mentioned production.</p>
                                <h5>Add Signature</h5>
                                <canvas id="signature-pad" width=400 height=200></canvas>
                                <input type="hidden" name="signature" data-class="no-validation" id="signature-input">
                                <input type="hidden" name="user_id" data-class="no-validation" value="{{auth()->user()->id}}">
                                <div class="d-flex align-items-center">
                                    <button type="button" data-class="no-validation" class="px-3 text-white mr-2" id="undo-button"><i class="fas fa-undo mr-2"></i>Undo</button>
                                    <button type="button" data-class="no-validation" class="px-3 text-white bg-danger" id="clear-button"><i class="fas fa-eraser mr-2"></i>Clear</button>
                                </div>
                                <div class="g-recaptcha mt-5" data-sitekey="6LfhyjolAAAAAHsmsc1Aflgn3UBj9LRoNlp-rjEo" data-callback="recaptchaCallback"></div>
                                <div class="text-right d-none" id="saveBtn">
                                    <button type="submit" data-class="no-validation" class="px-3 py-1 text-white mr-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

<script>
    function recaptchaCallback(response) {
        $("#saveBtn").removeClass('d-none');
    }
    // Set the expiration time for the reCAPTCHA (in milliseconds)
    const expirationTime = 120000; // 2 minutes

    // Check the reCAPTCHA status every second
    setInterval(function() {
        // Get the reCAPTCHA response token
        const response = grecaptcha.getResponse();
        // If the response is empty, the reCAPTCHA has expired
        if (!response) {
            console.log('reCAPTCHA has expired!');
            $("#saveBtn").addClass('d-none');

            // Add your expired reCAPTCHA code here
        }
    }, 1000);
    $(document).ready(function() {
        // var recaptchaResponse = grecaptcha.getResponse();
        // console.log(recaptchaResponse);

        var canvas = document.getElementById('signature-pad');
        var signaturePad = new SignaturePad(canvas);

        var clearButton = document.getElementById('clear-button');
        var undoButton = document.getElementById('undo-button');
        var signatureInput = document.getElementById('signature-input');

        clearButton.addEventListener('click', function() {
            signaturePad.clear();
        });


        undoButton.addEventListener('click', function() {
            var data = signaturePad.toData();
            if (data) {
                data.pop(); // remove the last stroke
                signaturePad.fromData(data);
            }
        });

        // saveButton.addEventListener('click', function() {
        //     var dataURL = signaturePad.toDataURL();
        //     signatureInput.value = dataURL;
        // });

        canvas.addEventListener('mousedown', function() {
            signaturePad.clear(); // clear any existing signature
        });

        canvas.addEventListener('mouseup', function() {
            var dataURL = signaturePad.toDataURL(); // get the signature as a data URL
            // do something with the data URL, like save it as an image
        });

        $("#releaseForm").submit(function(e) {
            e.preventDefault();
            validation = validateForm();
            if (validation) {
                if (signaturePad.isEmpty()) {
                    swal({
                        title: "Signature Error",
                        text: "Signature Field is required.",
                        icon: "error",
                    });
                    return;
                }
                var dataURL = signaturePad.toDataURL();
                signatureInput.value = dataURL;
                $("#releaseForm")[0].submit();
            } else {
                swal({
                    title: "Some Fields Missing",
                    text: "Please fill all fields.",
                    icon: "error",
                });
            }
        })

        function validateForm() {
            let errorCount = 0;
            $("form#releaseForm :input").each(function() {
                let val = $(this).val();
                if (val == '' && $(this).attr('data-class') !== 'no-validation') {
                    errorCount++
                    $(this).css('border-bottom', '1px solid red');
                } else {
                    $(this).css('border-bottom', '1px solid #999');
                }
            });
            if (errorCount > 0) {
                return false;
            }
            return true;
        }

    });
</script>
@endsection