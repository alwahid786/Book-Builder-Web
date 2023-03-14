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
    .logout{
        position: absolute;
        bottom: 0;
        left: 0;
        border-radius: 0px;
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
                <div class="leftDiv p-4 text-center position-relative">
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
                    <button class="logout py-2 mb-3 w-100">Logout</button>
                </div>
            </div>
            <div class="col-9" id="welcomeDiv" style="display:none">
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
            <div class="col-9" id="gratitudeDiv">
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
                                    <h3 class="text-center mt-3" style="color:#6dabe4">My name is Don Williams and I’m Grateful</h3>
                                    <p class="text-center mt-3">My gratitude journey started at the Entrepreneur’s Organization Global Leadership Conference in Bangkok, Thailand. A smart lady and now friend by the name of Gina Mollicone- Long was speaking during a break-out session. Gina is a Process Control Engineer by education and a trainer of Performance Coaches professionally. I was lucky to be in the audience when she talked about the role of energy and emotion in human performance. During her lecture, she proposed that humans perform at their highest level when they express or experience gratitude, and at their lowest level when they express or experience fear or shame. Little did I know that thought would completely change my life.</p>
                                    <p class="text-center mt-3">When we returned to the United States, I drove myself to our local Home Depot and bought a small, galvanized pail. It wasn’t heavy but it’s noticeable, it’s shiny, not easy to carry in your pocket and you can’t really hide it, the pail is about eight inches tall and eight inches across. I wrote the word “gratitude” on a piece of paper and dropped it the pail. I carried the pail everywhere with me. That pail became a physical reminder to me to be intentional about my gratitude practice. It sat in the passenger seat of my car, in my truck, on the desk in my home office, on the credenza in my actual office, and beside the TV when Sunday movies came on. I did this for six months. The pail was my physical reminder to practice gratitude The interesting thing about gratitude, is the more you practice gratitude the more grateful you become. After six months or so I made the decision, I was going to share my newfound gratitude with my Company Leadership Team.</p>
                                    <p class="text-center mt-3">We started a weekly Gratitude Exercise called One Good Thing. Every Monday at nine in the morning, each member was given one minute or two to share One Good Thing. One Good Thing is a share of whatever a person is most Grateful from their business, family, or personal life from the previous week. It was awkward at first and took a while before people were comfortable enough to really share, but once they did, their stories were eye opening.</p>
                                    <p class="text-center mt-3">Two stories stand out for me. One of my teammates was a parent to a daughter who loved soccer. When it was his turn to speak, he said that he was grateful that his daughter finally introduced him to her friends. You see, my teammate had been attending his daughter’s soccer games week in and week out, but his daughter never acknowledged that he was
                                        there. Until one day, she did. That tiny moment made my teammates’ week.
                                    </p>
                                    <p class="text-center mt-3 mb-5">Another teammate was a new grandmother. We all knew that her daughter was pregnant, and that they were all excited for the baby. What we didn’t know was that the baby had been diagnosed with a congenital defect that increased his risk for not surviving to term. If he did survive to term, the doctor said that it would be likely that he would be stillborn. If he wasn’t stillborn, he would most likely die immediately after birth. When it was her turn to speak, she said that she was grateful that her grandson was born. Though he lived only an hour, she was grateful to meet her grandson, hold him and tell him she loved him. I thought I was going to teach my teammates about the power of Gratitude, and I learned so much more than I taught.</p>
                                    <hr class="w-25 mx-auto">
                                </div>
                                <div class="text-left mt-3">
                                    <h4 class="mb-0">Gratitude Story</h4>
                                    <h6>- Sample 2 -</h6>
                                    <h3 class="text-center mt-3" style="color:#6dabe4">Ripples to Waves</h3>
                                    <p class="text-center mt-3">We moved to London in the summer of 2016. Our new apartment was still littered with boxes and half- unpacked luggage when my wife discovered a lump in her breast. We found ourselves in the doctor’s office that very same week. My wife was 32—young, healthy, and with no family history of the disease— when she was diagnosed with breast cancer.</p>
                                    <p class="text-center ">It goes without saying that our move to London was a momentous occasion. It required months of discernment and an endless list of paperwork. We pushed through because we realized that it was a tremendous opportunity that we couldn’t possibly say no to. Sitting in the doctor’s office that day felt like someone had pulled the rug out from under our new home. I could easily say that that was the worst day of my life, but that would also be discounting my wife’s strength.</p>
                                    <p class="text-center ">Shortly after her diagnosis, my wife underwent a mastectomy. She received 6 sessions of chemotherapy and more rounds of radiation than I can count. Her hair fell out in fistfuls. Twice, she had to be rushed to intensive care. My wife remained so graceful all throughout.</p>
                                    <p class="text-center ">To a lot of people, cancer feels like a destructive force. It is long nights and little sleep; food that tastes like paper; and cold soup when no other meal will do. For us, it was Friday nights in chemotherapy, and weekends spent gathering energy for the week ahead. Tiny things became great things. We celebrated every time she was strong enough to sit unaided. We celebrated when chocolate cake tasted like chocolate cake.
                                    </p>
                                    <p class="text-center ">For Sue, cancer became her strength. She kept a journal the whole time she was sick. Every morning, she would make a list of everything she was grateful for. Every night, she would read through what she wrote, It inspired her enough to write a book—a book that will be published this year. Sue also went on social media, where she educated others about her journey with cancer. I sit by her proudly, as she types on her phone. It has been such a pleasure seeing her get stronger despite and because of her diagnosis.</p>
                                    <p class="text-center mt-3 mb-5">For me, cancer became a wake-up call. For most of my adult life, I was only concerned with making a living. I wanted to make a name for myself and be remembered. Sue’s diagnosis taught me that there is more to life than that. These days, I try to pursue a life where I can effect positive change. Every ripple starts with a single good deed, and I intend to create a wave.</p>
                                    <div class="text-right mb-5">
                                        <h6 class="my-0">Gratefully,

                                        </h6>
                                        <h6 class="my-0">
                                            Raj Goodman Anand
                                        </h6>
                                    </div>
                                    <hr class="w-25 mx-auto">
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
                                <div class="text-left">
                                    <h4 class="mb-0">Romancing Your Customer Story</h4>
                                    <h6>- Sample 1 -</h6>
                                    <h3 class="text-center mt-3" style="color:#6dabe4">What is Your Emotional Intelligence?</h3>
                                    <p class="text-center mt-3">The first time I flew with Emirates Airlines, they sent a driver in a new black Yukon Denali to my home to pick up my wife and me. He drove responsibly, handled our luggage at the baggage counter, and delivered us to our gate in plenty of time to comfortably make our flight.</p>
                                    <p class="text-center mt-3">This first-class limo service was included in our business class tickets. With this significant “Wow!” factor, I felt cared for before we arrived at the airport.</p>
                                    <p class="text-center mt-3">Boarding the airline, a flight attendant greeted me with a smile. “Would you like to see the wine list?”</p>
                                    <p class="text-center mt-3">Surveying the premium wines available, I replied, “I’ll have the 2004 Bordeaux, please”. When did you have a ten-year-old wine on an airplane?</p>
                                    <p class="text-center mt-3 mb-5">Another teammate was a new grandmother. We all knew that her daughter was pregnant, and that they were all excited for the baby. What we didn’t know was that the baby had been diagnosed with a congenital defect that increased his risk for not surviving to term. If he did survive to term, the doctor said that it would be likely that he would be stillborn. If he wasn’t stillborn, he would most likely die immediately after birth. When it was her turn to speak, she said that she was grateful that her grandson was born. Though he lived only an hour, she was grateful to meet her grandson, hold him and tell him she loved him. I thought I was going to teach my teammates about the power of Gratitude, and I learned so much more than I taught.</p>
                                    <p class="text-center mt-3 mb-5">After takeoff, another attendant brought a menu offering filet mignon and sea bass. “If you are ready to eat before the time we customarily serve the meal, we can prepare and serve to order.”</p>
                                    <p class="text-center mt-3 mb-5">Dallas / Fort Worth airport to Dubai is a 16-hour flight. After dinner, an attendant asked if I’d like my seat to lie flat like a bed to sleep. Moments later she brought a memory foam mattress complete with high thread count sheets.</p>
                                    <p class="text-center mt-3 mb-5">Following the best flight I had experienced, we arrived in the busiest airport in the world. Daily, Dubai has more than 90,000 passengers flowing through the airport with the accompanying lines of people needing to get from one place to another. Included in our ticket was a “fast pass” through customs similar to the express pass at Disneyworld, saving us time and frustration.</p>
                                    <p class="text-center mt-3 mb-5">Remember the driver who started this story? Another driver in a shiny Mercedes met us at midnight when our plane landed. This driver delivered these weary travelers to the comfort of our hotel. Our return flight from Dubai to the United States proved to be a mirror experience to our exceptional outgoing trip. Wow!</p>
                                    <p class="text-center mt-3 mb-5">Talk about romancing your customer. No wonder Emirates Airlines is the largest airline in the Middle East and the fourth largest airline by scheduled revenue worldwide.</p>
                                    <hr class="w-25 mx-auto">
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

                                    <div id="editor2"></div>
                                </div>
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
        CKEDITOR.replace('editor2', {
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