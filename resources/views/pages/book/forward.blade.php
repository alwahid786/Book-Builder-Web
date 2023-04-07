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

    .nav-item .active {
        background-color: #6dabe4 !important;
        color: white !important;
    }

    .nav-item a {
        color: #33363a;
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
        <h3 class="av_heading text-center">Forward</h3>
        <form action="{{route('forwardDetail')}}" method="post" id="forwardForm" class="pt-3">
            @csrf
            <div class="mb-3 text-center" style="border: 1px solid lightgray;  padding: 10px;">
                <h6 class="text-center">- Sample -</h6>
                <div id="sample1">

                    <p class="m-0">I’m Don Williams and I’ll serve as your romance guide through this book. As the founder and CEO of Don Williams Global, my company helps small, medium, and major corporations deliver better experiences to their prospects which helps them become customers, and helps customers remain and become more profitable customers.</p>
                    <p class="m-0">Have you seen that bumper sticker that says, “I wasn’t born in Texas, but I got here as fast as I could”? That’s me. I grew up in Kansas and moved to Texas in 1986 when I opened my first company.</p>
                    <p class="mt-0">During my initial eighteen months in business we nearly starved to death. I did no business. Halfway through that second year, things began to work better and at the end of year two I opened a second location in another city. That second location introduced five more years of struggle, and then in the next three years Itransitioned from surviving to thriving in multiple locations.</p>
                    <p class="m-0">The single action that resulted in the greatest gain occurred when we, as a company, began looking at everything we did from the customer’s point of view.</p>
                    <ul class="ml-3 text-left" style="color:#777;">
                        <li>
                            How could we help the customer fall in love with our company?
                        </li>
                        <li>
                            How could we make doing business with our company such a great experience for our customer they looked forward to working with us again?
                        </li>
                        <li>
                            How could we add a “Wow!” factor to our customer service?
                        </li>
                    </ul>
                    <p class="mt-0">The results were astounding. Our company grew from two locations in seven years to 19 locations in three years. Wow! Three years later we pivoted from that company and started a new business.</p>
                    <p class="mt-0">Since 1999, I’ve worked with 273 Fortune 500 Companies in marketing, sales and service strategies, and execution. Like Jiminy Cricket, I come alongside the big boys and girls of American and International business. In addition to my Fortune 500 clients, I’ve had the great pleasure to work with major firms from Australia, China, France, Greece, Israel, Italy, Spain, United Arab Emirates, and the United Kingdom on efforts in the American and International markets.</p>
                    <p class="mt-0">One common denominator of major success in businesses from Main Street to Wall Street is – drum roll, please – does a business approach their prospects, customers, and previous customers from an attitude of care and gratitude? Do they show the same appreciation to their employees, contractors, partners, and vendors? In my experience, the great business romantics provide an unparalleled and unforgettable level of service.</p>
                    <p class="mt-0">Let’s look at companies that do a fantastic job romancing their customers and compare how their customer service affects the overall brand of the company, and therefore, the bottom line. This strategy also works with employees, vendors, partners, neighbors, children, and your spouse/mate/love/squeeze. Your customers deserve the rewards of real romance from your company and so do you.</p>
                    <p class="mt-0">Apply romance liberally for nearly instant results. An added benefit is that you can apply the same principles that make you successful in business to other areas and experience exponential results in your personal life.</p>
                </div>
                <button class="px-3 py-1" id="sample1Btn" type="button" data-class="avatar">Copy To Editor</button>

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
                    <div id="editor2"><?php echo $bookdata['forward'] ?? '' ?></div>
                </div>
            </div>
            <input type="hidden" name="forward" id="contentInput" data-class="avatar">
            <input type="hidden" name="user_id" data-class="avatar" value="<?php echo  $bookdata['user_id'] ?? '' ?>">
            
            <div class=" mx-2 mt-3 d-flex justify-content-between align-items-center">
                <a href="{{url('/how-to-use')}}">
                    <button type="button" data-class="avatar" class="px-3 py-1"><i class="fas fa-arrow-left mr-2"></i>Previous</button></a>
                <button id="save"  data-class="avatar" class="px-3 py-1 "><i class="fas fa-save mr-2"></i>Save</button>
            </div>
        </form>
    </div>
    <a target="_blank" href="{{route('createPDF')}}">
        <button class="p-2 pdfBtn"><i class="fas fa-book"></i></button>
    </a>
</section>
<!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        $("#sample1Btn").click(function() {
            copyHtmlToEditor('sample1');
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

        CKEDITOR.replace('editor', {
            height: '400px',
            removePlugins: 'elementspath'
        });
        CKEDITOR.replace('editor2', {
            height: '400px',
            removePlugins: 'elementspath'
        });

        // Contact Us Form Submission Function
        $("#forwardForm").submit(function(e) {
            e.preventDefault();
            validation = validateForm();
            if (validation) {
                var content = CKEDITOR.instances['editor2'].getData();
                $('#contentInput').val(content);
                $("#forwardForm")[0].submit();
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
            $("form#forwardForm :input").each(function() {
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
    $('.menu .item:nth-of-type(17) a').addClass('active-nav');
</script>


@endsection