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
            <div class="col-9" id="welcomeDiv" <?php if (request()->query->has('url')) {
                                                    echo 'style="display:none"';
                                                } ?>>
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
                                    <h2>Welcome to 3X Author & Your Book Builder tool</h2>
                                    <p class="my-3">Your Book Builder simplifies and speeds up the process of writing your book. In addition to making it easy to get your book to paper (or screen – LOL). The tool will help you track your progress toward the finish line. </p>
                                    <p>The biggest challenge about getting a book out of your head or heart and on to paper is your own brain. Most people overthink the process. Some overthinkers suffer from paralysis of analysis. Somewhere between starting and finishing their book, they reach a point where they just freeze. It took me a year to write my first book and it’s a 60-page book. I’ll write a brand-new book alongside you and share my progress during the project. </p>
                                    <p>Remember, getting to the finish line is as easy as you think it is. Henry Ford said “Whether you think you can, or you think you can't – you're right.” That quote is certainly true about writing a book. You’ll probably be amazed at the changes in your attitude, business, and life you’ll see as an Author.</p>
                                    <p>Nothing builds Authority like being an Author. </p>
                                    <p>Thank you for allowing me to help you on this journey, I’m grateful. </p>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <iframe width="100%" height="345" src="https://www.youtube.com/embed/ptssvF8NYnI">
                                </iframe>
                            </div> -->
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
            <div class="col-9" id="storyDiv" <?php if (request()->query->has('url') && request()->query('url') == 'story') {
                                                    echo 'style="display:block"';
                                                } else {
                                                    echo 'style="display:none"';
                                                } ?>>
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
                                <div>
                                    <h2 class="text-center">Story Telling</h2>
                                    <p class="mt-3 mb-0"><strong>Tip 1 -</strong> Tell your story to a specific person.</p>
                                    <p class=" mb-0"><strong>Tip 2 -</strong> Tell your story in chronological order.</p>
                                    <p class=" mb-0"><strong>Tip 3 -</strong> Tell your story from your heart.</p>
                                    <p class=" mb-0">Tell Your Story like a Fairy Tale or a Hero’s Journey or both!</p>

                                    <h5 class=" my-2"><strong>Cinderella</strong></h5>
                                    <p class=" mb-0">Cinderella was a beautiful and kind-hearted girl who lived with her wicked stepmother and stepsisters. They made her do all the household chores and treated her poorly.</p>
                                    <p class=" mb-0">One day, the prince of the kingdom announced a grand ball, and all the eligible maidens were invited. Cinderella wanted to go, but her stepmother forbade her from attending.</p>
                                    <p class=" mb-0">With the help of her fairy godmother, Cinderella got a beautiful dress, glass slippers, and a carriage. She went to the ball and danced with the prince, but had to leave before midnight, leaving behind one glass slipper.</p>
                                    <p class=" mb-0">The prince searched the kingdom for the owner of the slipper and finally found Cinderella. He recognized her beauty and kindness, and they lived happily ever after.</p>
                                    <p class=" mb-0">The original Cinderella Story was titled "Cendrillon ou La petite pantoufle de verre" and written by Charles Perrault in the late 17th century.</p>

                                    <h5 class=" my-2"><strong>Tell Your Story like the Hero’s Journey</strong></h5>
                                    <p class=" mb-0"><strong>The Call to Adventure -</strong> The hero receives a call to action or adventure, which sets them on a journey.</p>
                                    <p class=" mb-0"><strong>Refusal of the Call -</strong> The hero may initially refuse the call, often due to fear or self-doubt.</p>
                                    <p class=" mb-0"><strong> Acceptance of the Call - </strong>The hero eventually accepts the call to adventure and begins their journey.</p>
                                    <p class=" mb-0"><strong> Meeting the Mentor - </strong>The hero meets a mentor who provides guidance and assistance on their journey.</p>
                                    <p class=" mb-0"><strong> Crossing the Threshold - </strong>The hero crosses a threshold into the unknown or unfamiliar world of their adventure.</p>
                                    <p class=" mb-0"><strong> Trials and Challenges - </strong>The hero faces various trials and challenges that test their skills, abilities, and resolve.</p>
                                    <p class=" mb-0"><strong> The Approach -</strong> The hero approaches their ultimate goal, facing greater obstacles and challenges.</p>
                                    <p class=" mb-0"><strong> The Ordeal -</strong> The hero faces their greatest challenge or ordeal, often a life or death situation.</p>
                                    <p class=" mb-0"><strong> The Reward -</strong> The hero emerges from their ordeal with a reward, such as knowledge, a magical object, or a sense of self-discovery.</p>
                                    <p class=" mb-0"><strong> The Road Back - </strong> The hero begins their journey back to their ordinary world, often facing new challenges.</p>
                                    <p class=" mb-0"><strong> The Resurrection - </strong>The hero faces a final challenge, often a battle or confrontation, that tests their growth and transformation.</p>
                                    <p class=""><strong> The Return - </strong> The hero returns to their ordinary world, using their new knowledge and abilities to help others or make positive changes in their world.</p>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <iframe width="100%" height="345" src="https://www.youtube.com/embed/ptssvF8NYnI">
                                </iframe>
                            </div> -->
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
            <div class="col-9" id="gratitudeDiv" <?php if (request()->query->has('url') && request()->query('url') == 'gratitude') {
                                                        echo 'style="display:block"';
                                                    } else {
                                                        echo 'style="display:none"';
                                                    } ?>>
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
                                        <button id="startBtn1" data-sr_no="1" data-editor_name="editor" class="btn-success startBtn">Start Recording</button>
                                        <button id="stopBtn1" data-sr_no="1" class="btn-danger stopBtn" style="display: none;">Stop Recording</button>
                                        <button id="resetBtn1" data-sr_no="1" class="btn-danger resetBtn" style="display: none;">Reset Text</button>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="zmdi zmdi-circle mr-2"></i>
                                        <div id="timer1">00:00:00</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div id="editor"><?php if (isset($user->gratitude) && $user->gratitude != null) {
                                                            echo $user->gratitude;
                                                        } ?></div>
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
            <div class="col-9" id="romanceDiv" <?php if (request()->query->has('url') && request()->query('url') == 'romance-customer') {
                                                    echo 'style="display:block"';
                                                } else {
                                                    echo 'style="display:none"';
                                                } ?>>
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
                                        <button id="startBtn2" data-sr_no="2" data-editor_name="editor2" class="btn-success startBtn">Start Recording</button>
                                        <button id="stopBtn2" data-sr_no="2" class="btn-danger stopBtn" style="display: none;">Stop Recording</button>
                                        <button id="resetBtn2" data-sr_no="2" class="btn-danger resetBtn" style="display: none;">Reset Text</button>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="zmdi zmdi-circle mr-2"></i>
                                        <div id="timer2">00:00:00</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div id="editor2"><?php if (isset($user->romance) && $user->romance != null) {
                                                            echo $user->romance;
                                                        } ?></div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="text-right">
                                    <!-- <a href="{{url('/avatar')}}"> -->
                                    <button class="px-5 py-2" id="startBook">
                                        <i class="zmdi zmdi-arrow-right mr-2"></i>
                                        Start A Book
                                    </button>
                                    <!-- </a> -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        CKEDITOR.replace('editor', {
            height: '400px'
        });
        CKEDITOR.replace('editor2', {
            height: '400px'
        });

        $("#storyBtn").click(function() {
            $('#welcomeDiv').fadeOut(500);
            $('#storyDiv').fadeIn(500);
        })
        $("#gratitudeBtn").click(function() {
            $('#storyDiv').fadeOut(500);
            $('#gratitudeDiv').fadeIn(500);
        })
        $("#romanceBtn").click(function() {

            var gratitudeContent = CKEDITOR.instances['editor'].getData();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                url: `{{route('updateGratitude')}}`,
                type: "POST",
                data: {
                    gratitude: gratitudeContent,
                },
                cache: false,
                success: function(dataResult) {

                },
            });
            resetTimer(1);
            $('#gratitudeDiv').fadeOut(500);
            $('#romanceDiv').fadeIn(500);
        });
        $("#startBook").click(function() {

            var gratitudeContent = CKEDITOR.instances['editor2'].getData();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                url: `{{route('updateRomance')}}`,
                type: "POST",
                data: {
                    gratitude: gratitudeContent,
                },
                cache: false,
                success: function(dataResult) {
                    window.location.href = `{{url('/avatar')}}`;
                },
            });

        });


    });

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
</script>
@endsection