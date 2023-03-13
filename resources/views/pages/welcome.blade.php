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
        min-height: 100%;
        width: 100%;
        background-color: white;
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
</style>
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
                <div class="leftDiv p-4 text-center">
                    <div class="imgDiv mx-auto">
                        <img src="{{asset('assets/images/logo.jpeg')}}" alt="">
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
                </div>
            </div>
            <div class="col-9" id="welcomeDiv">
                <div class="rightDiv">
                    <div class="progress mt-3">
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressEmpty"></div>
                        <div class="dot"></div>
                        <div class="progressEmpty"></div>
                        <div class="dot"></div>
                        <div class="progressEmpty"></div>
                    </div>
                    <div class="container px-5 py-3 my-3">
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
                                    <!-- <a href="{{url('/storytelling')}}"> -->
                                    <button class="px-3 py-2" id="storyBtn">
                                        <i class="zmdi zmdi-arrow-right mr-2"></i>
                                        Story Telling
                                    </button>
                                    <!-- </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9" id="storyDiv" style="display:none">
                <div class="rightDiv">
                    <div class="progress mt-3">
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressEmpty"></div>
                        <div class="dot"></div>
                        <div class="progressEmpty"></div>
                    </div>
                    <div class="container px-5 py-3 my-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <h2>Story Telling</h2>
                                    <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius fugit sint laborum recusandae eaque voluptatibus sequi nobis dolore eos nesciunt nihil voluptatum nam ea vitae accusamus nisi iste modi odit consequatur nemo, consectetur tenetur aperiam! Error ipsam quisquam exercitationem at incidunt quam consequatur? Numquam voluptatem ea fuga quisquam laborum provident sequi cupiditate qui! Vel, tempora facilis. Maxime, omnis! Temporibus expedita optio libero repellat, tempore illo consectetur perferendis, aut natus cum ab id sapiente asperiores ipsam nam ullam ut perspiciatis harum voluptas facere! Amet, consectetur aperiam? Provident accusantium exercitationem rerum suscipit! Nam inventore sapiente nihil ratione, ducimus ea dolorem vitae dolores!</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <iframe width="100%" height="345" src="https://www.youtube.com/embed/ptssvF8NYnI">
                                </iframe>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="text-right">
                                    <button class="px-5 py-2" id="gratitudeBtn">
                                        <i class="zmdi zmdi-arrow-right mr-2"></i>
                                        Gratitude Story
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9" id="gratitudeDiv" style="display:none">
                <div class="rightDiv">
                    <div class="progress mt-3">
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressEmpty"></div>
                    </div>
                    <div class="container px-5 py-3 my-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-left">
                                    <h4 class="mb-0">Gratitude Story</h4>
                                    <h6>- Sample 1 -</h6>
                                    <h3 class="text-center" style="color:#6dabe4">My name is Don Williams and I’m Grateful</h3>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <h4 class="mb-0">Record Audio</h4>
                                <p>Record audio to convert to text in the editor below.</p>
                                <div id="controls" class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <!-- <button id="startButton" class="btn-success">Record</button>
                                        <button id="stopButton" class="btn-danger" disabled>Stop</button> -->
                                        <button id="startBtn" class="btn-success">Start Recording</button>
                                        <button id="stopBtn" class="btn-danger" style="display: none;">Stop Recording</button>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="zmdi zmdi-circle mr-2"></i>
                                        <div id="timer">00:00:00</div>
                                    </div>
                                    <!-- <button id="pauseButton">Pause</button> -->
                                </div>
                                <div class="mt-3">
                                    <!-- <textarea id="transcription" rows="5"></textarea> -->

                                    <div id="editor"></div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="text-right">
                                    <button class="px-5 py-2" id="romanceBtn">
                                        <i class="zmdi zmdi-arrow-right mr-2"></i>
                                        Romance Story
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9" id="romanceDiv" style="display:none">
                <div class="rightDiv">
                    <div class="progress mt-3">
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressComplete"></div>
                        <div class="dot"></div>
                        <div class="progressComplete"></div>
                    </div>
                    <div class="container px-5 py-3 my-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <h2>Romance With Customer Story</h2>
                                    <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius fugit sint laborum recusandae eaque voluptatibus sequi nobis dolore eos nesciunt nihil voluptatum nam ea vitae accusamus nisi iste modi odit consequatur nemo, consectetur tenetur aperiam! Error ipsam quisquam exercitationem at incidunt quam consequatur? Numquam voluptatem ea fuga quisquam laborum provident sequi cupiditate qui! Vel, tempora facilis. Maxime, omnis! Temporibus expedita optio libero repellat, tempore illo consectetur perferendis, aut natus cum ab id sapiente asperiores ipsam nam ullam ut perspiciatis harum voluptas facere! Amet, consectetur aperiam? Provident accusantium exercitationem rerum suscipit! Nam inventore sapiente nihil ratione, ducimus ea dolorem vitae dolores!</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <iframe width="100%" height="300" src="https://www.youtube.com/embed/ptssvF8NYnI">
                                </iframe>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="text-right">
                                    <button class="px-5 py-2">
                                        <i class="zmdi zmdi-arrow-right mr-2"></i>
                                        Next
                                    </button>
                                </div>
                            </div>
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

<script>
    $(document).ready(function() {
        $("#storyBtn").click(function() {
            $('#welcomeDiv').fadeOut(500);
            $('#storyDiv').fadeIn(500);
        })
        $("#gratitudeBtn").click(function() {
            $('#storyDiv').fadeOut(500);
            $('#gratitudeDiv').fadeIn(500);
        })
        $("#romanceBtn").click(function() {
            $('#gratitudeDiv').fadeOut(500);
            $('#romanceDiv').fadeIn(500);
        })

        CKEDITOR.replace('editor', {
            height: '400px'
        });


        // // Define variables for the audio stream and RecordRTC object
        // let stream;
        // let recordRTC;
        // var startTime;
        // var timerInterval;
        // // Get references to the start and stop buttons
        // const startButton = document.getElementById('startButton');
        // const stopButton = document.getElementById('stopButton');

        // // Add event listeners to the buttons
        // startButton.addEventListener('click', startRecording);
        // stopButton.addEventListener('click', stopRecording);

        // // Function to start the recording process
        // function startRecording() {
        //     $(".zmdi-circle").addClass('red');
        //     startTimer();
        //     startButton.disabled = true;
        //     stopButton.disabled = false;
        //     navigator.mediaDevices.getUserMedia({
        //             audio: true
        //         })
        //         .then(function(audioStream) {
        //             // Store the audio stream in the stream variable
        //             stream = audioStream;

        //             // Initialize the RecordRTC object with the audio stream
        //             recordRTC = new RecordRTC(audioStream, {
        //                 type: 'audio'
        //             });

        //             // Start recording
        //             recordRTC.startRecording();
        //         })
        //         .catch(function(error) {
        //             console.error(error);
        //         });
        // }

        // // Function to stop the recording process
        // function stopRecording() {
        //     $(".zmdi-circle").removeClass('red');
        //     startButton.disabled = false;
        //     stopButton.disabled = true;
        //     stopTimer();
        //     // Stop recording
        //     recordRTC.stopRecording(function() {
        //         // Get the recorded audio data as a Blob object
        //         const blob = recordRTC.getBlob();

        //         // Create a URL for the Blob object
        //         const audioURL = URL.createObjectURL(blob);

        //         // Create an audio element to play the recorded audio
        //         const audio = document.createElement('audio');
        //         audio.controls = true;
        //         audio.src = audioURL;

        //         // Append the audio element to the recordings list
        //         const recordingsList = document.getElementById('recordingsList');
        //         recordingsList.appendChild(audio);

        //         // Release the resources used by the audio stream and RecordRTC object
        //         stream.getTracks().forEach(function(track) {
        //             track.stop();
        //         });
        //         recordRTC.destroy();
        //     });
        // }



    })

    let recognition;
    let transcription = '';
    const startBtn = document.getElementById('startBtn');
    const stopBtn = document.getElementById('stopBtn');
    const transcriptionField = document.getElementById('editor');

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
                transcription += transcript + ' ';
            } else {
                interimTranscription += transcript;
            }
        }
        transcriptionField.innerHTML = transcription + interimTranscription;
    };

    // handle error event
    recognition.onerror = function(event) {
        console.log('Error occurred in recognition: ' + event.error);
    };

    // handle end event
    recognition.onend = function() {
        console.log('Recognition ended');
        startBtn.style.display = 'inline-block';
        stopBtn.style.display = 'none';
    };

    // add click event listener to start button
    startBtn.addEventListener('click', function() {
        //   if (transcription === '') {
        $(".zmdi-circle").addClass('red');
        startTimer();
        recognition.start();
        console.log('Recognition started');
        startBtn.style.display = 'none';
        stopBtn.style.display = 'inline-block';
        //   }
    });

    // add click event listener to stop button
    stopBtn.addEventListener('click', function() {
        //   transcription = '';
        //   transcriptionField.value = '';
        $(".zmdi-circle").removeClass('red');
        stopTimer();
        recognition.stop();
        console.log('Recognition stopped');
        startBtn.style.display = 'inline-block';
        stopBtn.style.display = 'none';
    });

    var startTime = 0;
    var elapsedTime = 0;
    var timerInterval;

    function startTimer() {
        if (elapsedTime === 0) {
            startTime = new Date().getTime();
        } else {
            startTime = new Date().getTime() - elapsedTime;
        }
        timerInterval = setInterval(updateTimer, 1000);
    }

    function stopTimer() {
        clearInterval(timerInterval);
        elapsedTime = new Date().getTime() - startTime;
    }

    function resetTimer() {
        clearInterval(timerInterval);
        elapsedTime = 0;
        document.getElementById('timer').innerHTML = '00:00:00';
    }

    function updateTimer() {
        var elapsedTime = new Date().getTime() - startTime;
        var seconds = Math.floor(elapsedTime / 1000) % 60;
        var minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
        var hours = Math.floor(elapsedTime / (1000 * 60 * 60)) % 24;
        document.getElementById('timer').innerHTML = formatTime(hours) + ':' + formatTime(minutes) + ':' + formatTime(seconds);
    }

    function formatTime(time) {
        return (time < 10 ? '0' : '') + time;
    }
</script>
@endsection