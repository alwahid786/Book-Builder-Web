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

    .completed {
        width: 10px;
        background-color: lawngreen;
        position: absolute;
        right: 0;
    }

    .disabled {
        background-color: #6dabe459;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>


@include('layouts.book-layout.navbar')
<section class="main">
    @include('layouts.book-layout.progress')
    <div class="content px-5 py-4">
        <h3 class="av_heading text-center">Inside Cover</h3>
        <div class="my-3">
            <!-- <div class="row">
                <div class="col-6 text-center" style="border: 1px solid lightgray;  padding: 10px;">
                    <h6 class="text-center">Sample 01</h6>
                    <h4>GRATITUDE STORIES FROM OUR HEARTS BY</h4>
                    <h5 style="color:#6dabe4;">DON WILLIAMS AND FRIENDS</h5>
                    <p class="m-0">Cover Art - “The Gratitude Heart”</p>
                    <p class="m-0">© 2020 Leta Farnsworth https://letafarnsworthart.com</p>

                </div>
                <div class="col-6 text-center" style="border: 1px solid lightgray;  padding: 10px;">
                    <h6 class="text-center">Sample 02</h6>
                    <h4 style="color:#6dabe4;">Romancing Your Customer</h4>
                    <h6>How to Passionately Attract, Retain, and Win-Back Customers
                        for Unbelievable Loyalty and Profit
                    </h6>
                    <p class=" m-0">By</p>
                    <p class=" m-0">Don Williams</p>

                </div>
            </div> -->
            <div class="my-3 text-center" style="border: 1px solid lightgray;  padding: 10px;">
                <h6 class="text-center">Sample 01</h6>
                <div id="sample1">
                    <h4>GRATITUDE STORIES FROM OUR HEARTS BY</h4>
                    <h5 style="color:#6dabe4;">DON WILLIAMS AND FRIENDS</h5>
                    <p class="m-0">Cover Art - “The Gratitude Heart”</p>
                    <p class="mt-0">© 2020 Leta Farnsworth https://letafarnsworthart.com</p>
                </div>
                <button class="px-3 py-1" id="sample1Btn">Copy To Editor</button>

                <hr>
                <h6 class="text-center">Sample 02</h6>
                <div id="sample2">
                    <h4 style="color:#6dabe4;">Romancing Your Customer</h4>
                    <h6>How to Passionately Attract, Retain, and Win-Back Customers
                        for Unbelievable Loyalty and Profit
                    </h6>
                    <p class=" m-0">By</p>
                    <p class=" mt-0">Don Williams</p>
                </div>
                <button class="px-3 py-1" id="sample2Btn">Copy To Editor</button>

            </div>
        </div>
        <form action="{{route('frontCoverDetail')}}" method="post" id="frontCoverForm" class="pt-3">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <div class="input-group w-100 mx-2">
                    <span class="text-secondary mb-2">Title</span>
                    <input type="text" value="<?php echo $bookdata['front_title'] ?? $bookdata['book_title'] ?>" name="front_title" id="av_f_name">
                </div>
                <div class="input-group w-100 mx-2">
                    <span class="text-secondary mb-2">Subtitle</span>
                    <input type="text" value="<?php echo $bookdata['front_subtitle'] ?? $bookdata['book_subtitle'] ?>" name="front_subtitle" id="av_l_name">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="input-group w-100 mx-2">
                    <span class="text-secondary mb-2">Author First Name</span>
                    <input type="text" value="<?php echo $bookdata['author_fname'] ?? auth()->user()->name ?>" name="author_fname" id="av_f_name">
                </div>
                <div class="input-group w-100 mx-2">
                    <span class="text-secondary mb-2">Author Last Name</span>
                    <input type="text" value="<?php echo $bookdata['author_lname'] ?? auth()->user()->l_name ?>" name="author_lname" id="av_l_name">
                </div>
            </div>
            <div class="mt-4">
                <h4 class="mb-0">Record Audio</h4>
                <p>Record audio to convert to text in the editor below.</p>
                <div id="controls" class="d-flex align-items-center justify-content-between">
                    <div>
                        <button id="startBtn2" data-sr_no="2" type="button" data-class="avatar" data-editor_name="editor2" class="btn-success startBtn px-3 py-1">Start Recording</button>
                        <button id="stopBtn2" data-sr_no="2" type="button" data-class="avatar" class="btn-danger stopBtn px-3 py-1" style="display: none;">Stop Recording</button>
                        <button id="resetBtn2" data-sr_no="2" type="button" data-class="avatar" class="btn-danger resetBtn px-3 py-1" style="display: none;">Reset Text</button>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="zmdi zmdi-circle mr-2"></i>
                        <div id="timer2">00:00:00</div>
                    </div>
                </div>
                <div class="mt-3">
                    <div id="editor2"><?php echo $bookdata['inside_cover_content'] ?? '' ?></div>
                </div>
            </div>
            <input type="hidden" name="inside_cover_content" id="contentInput" data-class="avatar">
            <input type="hidden" name="user_id" data-class="avatar" value="<?php echo  $bookdata['user_id'] ?? '' ?>">
            <div class="d-flex align-items-baseline justify-content-end">
                <input type="checkbox" data-class="avatar" id="final" style="display: inline-block; width:15px;margin-top:5px">
                <label for="final" class="position-relative ml-2" style="line-height: 1.8rem ;">FINAL ?</label>
            </div>
            <div class=" mx-2 mt-3 d-flex justify-content-between align-items-center">
                <a href="{{url('/cover-art')}}">
                    <button type="button" data-class="avatar" class="px-3 py-1"><i class="fas fa-arrow-left mr-2"></i>Previous</button>
                </a>
                <div class="">
                    <button id="save" data-class="avatar" disabled class="px-3 py-1 disabled"><i class="fas fa-save mr-2"></i>Save</button>
                </div>
            </div>
        </form>
    </div>
    <a target="_blank" href="{{route('createPDF')}}">
        <button class="p-2 pdfBtn"><i class="fas fa-book"></i></button>
    </a>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // function copyHtmlToEditor(id) {
    //     // Get the HTML content from the source div
    //     var sourceHtml = document.getElementById(id).innerHTML;
    //     var editor = CKEDITOR.instances['editor2'];
    //     editor.setData(sourceHtml);
    // }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#final').on('change', function() {
            if ($(this).is(':checked')) {
                $("#save").removeAttr('disabled');
                $("#save").removeClass('disabled');
            } else {
                $("#save").attr('disabled', 'disabled');
                $("#save").addClass('disabled');
            }
        });

        CKEDITOR.replace('editor', {
            height: '400px',
            removePlugins: 'elementspath'
        });
        CKEDITOR.replace('editor2', {
            height: '400px',
            removePlugins: 'elementspath'
        });
        $("#sample1Btn").click(function() {
            copyHtmlToEditor('sample1');
        })
        $("#sample2Btn").click(function() {
            copyHtmlToEditor('sample2');
        })


        function copyHtmlToEditor(id) {
            // Get the HTML content from the source div
            var sourceHtml = document.getElementById(id).innerHTML;
            var editor = CKEDITOR.instances['editor2'];
            editor.setData(sourceHtml);
        }
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

        // Contact Us Form Submission Function
        $("#frontCoverForm").submit(function(e) {
            e.preventDefault();
            validation = validateForm();
            if (validation) {
                var content = CKEDITOR.instances['editor2'].getData();
                $('#contentInput').val(content);
                $("#frontCoverForm")[0].submit();
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
            $("form#frontCoverForm :input").each(function() {
                let val = $(this).val();
                if (val == '' && $(this).attr('data-class') !== 'avatar') {
                    errorCount++
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', 'none');
                }
            });
            if (errorCount > 0) {
                return false;
            }
            return true;
        }


        let recognition;
        let transcription = '';
        let startBtn = document.getElementById('startBtn');
        let stopBtn = document.getElementById('stopBtn');
        let resetBtn = document.getElementById('resetBtn');
        let editorName = 'editor';

        // create a new instance of SpeechRecognition
        if (window.SpeechRecognition || window.webkitSpeechRecognition) {
            recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
        } else {
            console.log('Speech recognition not supported');
        }

        // set recognition properties
        recognition.continuous = true;
        recognition.interimResults = true;
        recognition.lang = 'en-US';

        // handle result event
        recognition.onresult = function(event) {
            let interimTranscription = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                let transcript = event.results[i][0].transcript;
                if (event.results[i].isFinal) {
                    var editor = CKEDITOR.instances[editorName];

                    // Get the current selection object
                    var selection = editor.getSelection();

                    // Get the current element where the cursor is blinking
                    var element = selection.getStartElement();

                    // Insert the text at the cursor position
                    // editor.setData('', { selectionStart: element, selectionEnd: element });
                    editor.insertText(transcript, element);
                    // CKEDITOR.instances.transcription.insertHtml(transcript);
                    //   transcription += transcript + ' ';
                }
                //    else {
                //       interimTranscription += transcript;
                //   }
            }
            //   transcriptionField.value = transcription + interimTranscription;

        };

        // handle error event
        recognition.onerror = function(event) {
            console.log('Error occurred in recognition: ' + event.error);
        };

        // handle end event
        recognition.onend = function() {
            console.log('Recognition ended');
            startBtn.style.display = 'inline-block';
            resetBtn.style.display = 'inline-block';
            stopBtn.style.display = 'none';
        };

        // add click event listener to start button
        $('.startBtn').click(function() {
            let sr_id = $(this).attr('data-sr_no');
            startBtn = document.getElementById('startBtn' + sr_id);
            stopBtn = document.getElementById('stopBtn' + sr_id);
            resetBtn = document.getElementById('resetBtn' + sr_id);
            // startBtn.addEventListener('click', function() {
            editorName = startBtn.getAttribute('data-editor_name');
            startTimer(sr_id);
            $(".zmdi-circle").addClass('red');
            recognition.start();
            console.log('Recognition started');
            startBtn.style.display = 'none';
            resetBtn.style.display = 'none';
            stopBtn.style.display = 'inline-block';
        });

        // add click event listener to stop button
        $('.stopBtn').click(function() {
            let sr_id = $(this).attr('data-sr_no');
            startBtn = document.getElementById('startBtn' + sr_id);
            stopBtn = document.getElementById('stopBtn' + sr_id);
            resetBtn = document.getElementById('resetBtn' + sr_id);
            stopTimer();
            $(".zmdi-circle").removeClass('red');
            recognition.stop();
            console.log('Recognition stopped');
            startBtn.style.display = 'inline-block';
            resetBtn.style.display = 'inline-block';
            stopBtn.style.display = 'none';
        });


        // add click event listener to reset button
        $('.resetBtn').click(function() {
            let sr_id = $(this).attr('data-sr_no');
            startBtn = document.getElementById('startBtn' + sr_id);
            stopBtn = document.getElementById('stopBtn' + sr_id);
            resetBtn = document.getElementById('resetBtn' + sr_id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the action here
                    resetTimer(sr_id);
                    transcription = '';
                    CKEDITOR.instances[editorName].setData('');
                    recognition.stop();
                    console.log('Recognition stopped');
                    resetBtn.style.display = 'none';
                }
            })
        });
        var startTime = 0;
        var elapsedTime = 0;
        var timerInterval;

        function startTimer(id) {
            if (elapsedTime === 0) {
                startTime = new Date().getTime();
            } else {
                startTime = new Date().getTime() - elapsedTime;
            }
            // timerInterval = setInterval(updateTimer, 1000);
            timerInterval = setInterval(function() {
                updateTimer(id);
            }, 1000);
        }

        function stopTimer() {
            clearInterval(timerInterval);
            elapsedTime = new Date().getTime() - startTime;
        }

        function resetTimer(id) {
            clearInterval(timerInterval);
            elapsedTime = 0;
            document.getElementById('timer' + id).innerHTML = '00:00:00';
        }

        function updateTimer(id) {
            var elapsedTime = new Date().getTime() - startTime;
            var seconds = Math.floor(elapsedTime / 1000) % 60;
            var minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
            var hours = Math.floor(elapsedTime / (1000 * 60 * 60)) % 24;
            document.getElementById('timer' + id).innerHTML = formatTime(hours) + ':' + formatTime(minutes) + ':' + formatTime(seconds);
        }

        function formatTime(time) {
            return (time < 10 ? '0' : '') + time;
        }
    });
</script>
<script>
    $('.menu .item:nth-of-type(12) a').addClass('active-nav');
</script>


@endsection