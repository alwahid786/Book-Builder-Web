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
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>


@include('layouts.book-layout.navbar')
<section class="main">
    @include('layouts.book-layout.progress')
    <div class="content px-5 py-4">
        <h3 class="av_heading text-center">Copyright</h3>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Template 01</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Template 02</a>
            </li>

        </ul><!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <form action="{{route('copyrightDetail')}}" method="post" id="frontCoverForm1" class="pt-3">
                    @csrf
                    <!-- <div class="d-flex justify-content-between align-items-center">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Copyright Year</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['copyright_year'] ?? '' ?>" name="copyright_year" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Copyright Name</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['copyright_name'] ?? '' ?>" name="copyright_name" id="av_l_name">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Company Name 1</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['company_name1'] ?? '' ?>" name="company_name1" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Company Name 2 (Optional)</span>
                            <input type="text" data-class="avatar" value="<?php echo $bookdata['copyright']['company_name2'] ?? '' ?>" name="company_name2" id="av_l_name">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Street Address 1</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['street_address1'] ?? '' ?>" name="street_address1" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Street Address 2 (Optional)</span>
                            <input type="text" data-class="avatar" value="<?php echo $bookdata['copyright']['street_address2'] ?? '' ?>" name="street_address2" id="av_l_name">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">City</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['city'] ?? '' ?>" name="city" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">State</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['state'] ?? '' ?>" name="state" id="av_l_name">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Country</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['country'] ?? '' ?>" name="country" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Zip Code</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['zipcode'] ?? '' ?>" name="zipcode" id="av_l_name">
                        </div>
                    </div> -->
                    <div class="my-3 text-center" style="border: 1px solid lightgray;  padding: 10px;">
                        <h6 class="text-center">- Sample 01 -</h6>
                        <p class="m-0">Copyright (Year) (First Name) (Last Name), (Company Name 1), (Company Name 2)</p>
                        <p class="mt-0">All Rights Reserved</p>
                        <p class="m-0">Contact the Author at:</p>
                        <p class="mt-0">(Street Address 1), (Street Address 2), (City), (ST) (Country) (Zip Code)</p>
                        <p class="m-0">First Edition</p>
                        <p class="m-0">All rights reserved. No part of this publication may be reproduced, distributed, or transmitted in any form or by any means, including photocopying, recording. Or other electronic or mechanical method(s) or by any information storage and retrieval systems without the prior written permission of the publisher and author, except in the case of brief quotations embodied in reviews and certain other non-commercial uses permitted by copyright law.</p>
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
                            <div id="editor2"><?php if (isset($bookdata['copyright']) && $bookdata['copyright']['template_id'] == 1) {
                                                    echo $bookdata['copyright']['content'];
                                                }  ?></div>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" data-class="avatar" value="<?php echo  $bookdata['copyright']['user_id'] ?? '' ?>">
                    <input type="hidden" name="template_id" data-class="avatar" value="1">
                    <input type="hidden" name="content" id="contentInput" data-class="avatar" value="1">
                    <div class="mx-2 mt-3 d-flex justify-content-between align-items-center">
                        <a href="{{url('/cover-art')}}">
                            <button type="button" data-class="avatar" class="px-3 py-1"><i class="fas fa-arrow-left mr-2"></i>Previous</button></a>
                        <button type="submit" id="save" data-class="avatar" class="px-3 py-1"><i class="fas fa-save mr-2"></i>Save</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
                <form action="{{route('copyrightDetail')}}" method="post" id="frontCoverForm2" class="pt-3">
                    @csrf
                    <!-- <div class="d-flex justify-content-between align-items-center">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Year of publication</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['publication_year'] ?? '' ?>" name="publication_year" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Author Name</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['author_name'] ?? '' ?>" name="author_name" id="av_l_name">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Cover Design By</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['cover_designer'] ?? '' ?>" name="cover_designer" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Edited By</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['editor'] ?? '' ?>" name="editor" id="av_l_name">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">Published By</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['publisher'] ?? '' ?>" name="publisher" id="av_f_name">
                        </div>
                        <div class="input-group w-100 mx-2">
                            <span class="text-secondary mb-2">ISBN</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['isbn'] ?? '' ?>" name="isbn" id="av_l_name">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="input-group w-50 mx-2">
                            <span class="text-secondary mb-2">Printed In Country</span>
                            <input type="text" value="<?php echo $bookdata['copyright']['printed_country'] ?? '' ?>" name="printed_country" id="av_f_name">
                        </div>
                    </div> -->
                    <div class="my-3 text-center" style="border: 1px solid lightgray;  padding: 10px;">
                        <h6 class="text-center">- Sample 02 -</h6>
                        <p class="m-0">COPYRIGHT © (year of publication) by (author's name)</p>
                        <p class="m-0">All rights reserved. No part of this book may be reproduced, stored in a retrieval system, or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without the prior written permission of the author/publisher.</p>
                        <p class="mt-0">This book is a work of fiction (or non-fiction) and any resemblance to persons, living or dead, or places, events or locales is purely coincidental. The characters are productions of the author's imagination and used fictitiously.</p>
                        <p class="m-0">Cover design by (cover designer's name)</p>
                        <p class="m-0">Edited by (editor's name)</p>
                        <p class="m-0">Published by (publisher's name)</p>
                        <p class="m-0">ISBN (insert ISBN here)</p>
                        <p class="m-0">Printed in (insert country where book is printed)</p>
                        <p class="m-0">(Insert any disclaimers or legal notices here)</p>
                        <p class="m-0">For permission to use material from this book, please contact the author or the publisher.</p>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-0">Record Audio</h4>
                        <p>Record audio to convert to text in the editor below.</p>
                        <div id="controls" class="d-flex align-items-center justify-content-between">
                            <div>
                                <button id="startBtn1" data-class="avatar" type="button" data-sr_no="1" data-editor_name="editor" class=" px-3 py-1 btn-success startBtn">Start Recording</button>
                                <button id="stopBtn1" data-class="avatar" type="button" data-sr_no="1" class="btn-danger stopBtn px-3 py-1 " style="display: none;">Stop Recording</button>
                                <button id="resetBtn1" data-class="avatar" type="button" data-sr_no="1" class="btn-danger resetBtn px-3 py-1 " style="display: none;">Reset Text</button>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="zmdi zmdi-circle mr-2"></i>
                                <div id="timer1">00:00:00</div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div id="editor"><?php if (isset($bookdata['copyright']) && $bookdata['copyright']['template_id'] == 2) {
                                                    echo $bookdata['copyright']['content'];
                                                }  ?></div>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" data-class="avatar" value="<?php echo  $bookdata['copyright']['user_id'] ?? '' ?>">
                    <input type="hidden" name="template_id" data-class="avatar" value="2">
                    <input type="hidden" name="content" id="contentInput2" data-class="avatar" value="1">

                    <div class=" mx-2 mt-3 d-flex justify-content-between align-items-center">
                        <a href="{{url('/cover-art')}}">
                            <button type="button" data-class="avatar" class="px-3 py-1"><i class="fas fa-arrow-left mr-2"></i>Previous</button></a>
                        <button id="save" data-class="avatar" class="px-3 py-1"><i class="fas fa-save mr-2"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>

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
            height: '400px'
        });
        CKEDITOR.replace('editor2', {
            height: '400px'
        });

        // Contact Us Form Submission Function
        $("#frontCoverForm1").submit(function(e) {

            console.log(content);
            e.preventDefault();
            validation = validateForm();
            if (validation) {
                var content = CKEDITOR.instances['editor2'].getData();
                $('#contentInput').val(content);
                $("#frontCoverForm1")[0].submit();
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
            $("form#frontCoverForm1 :input").each(function() {
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

        // Contact Us Form Submission Function
        $("#frontCoverForm2").submit(function(e) {
            e.preventDefault();
            validation = validateForm2();
            if (validation) {
                var content = CKEDITOR.instances['editor'].getData();
                $('#contentInput2').val(content);
                $("#frontCoverForm2")[0].submit();
            } else {
                swal({
                    title: "Some Fields Missing",
                    text: "Please fill all fields.",
                    icon: "error",
                });
            }
        })

        function validateForm2() {
            let errorCount = 0;
            $("form#frontCoverForm2 :input").each(function() {
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
    $('.menu .item:nth-of-type(7) a').addClass('active-nav');
</script>


@endsection