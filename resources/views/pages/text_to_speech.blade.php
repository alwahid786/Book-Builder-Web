
<style>
  #transcription {
    height: 100px;
    font-size: 16px;
    padding: 10px;
  }

  #startBtn, #stopBtn, #resetBtn {
    display: inline-block;
    padding: 10px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
  }

  #stopBtn, #resetBtn {
    background-color: #f44336;
  }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<button id="startBtn">Start Recording</button>
<button id="stopBtn" style="display: none;">Stop Recording</button>
<button id="resetBtn" style="display: none;">Reset</button>

<!-- create a text area to display the transcribed text -->
<!-- <textarea id="transcription" class="summernote" rows="5"></textarea> -->
<div id="summernote"></div>
<script>
  let recognition;
  let transcription = '';
  const startBtn = document.getElementById('startBtn');
  const stopBtn = document.getElementById('stopBtn');
  const resetBtn = document.getElementById('resetBtn');
  const transcriptionField = document.getElementById('transcription');

  // create a new instance of SpeechRecognition
  if (window.SpeechRecognition || window.webkitSpeechRecognition) {
      recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
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
      transcriptionField.value = transcription + interimTranscription;
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
  startBtn.addEventListener('click', function() {
    //   if (transcription === '') {
          recognition.start();
          console.log('Recognition started');
          startBtn.style.display = 'none';
          resetBtn.style.display = 'none';
          stopBtn.style.display = 'inline-block';
    //   }
  });

  // add click event listener to stop button
  stopBtn.addEventListener('click', function() {
    //   transcription = '';
    //   transcriptionField.value = '';
      recognition.stop();
      console.log('Recognition stopped');
      startBtn.style.display = 'inline-block';
          resetBtn.style.display = 'inline-block';
      stopBtn.style.display = 'none';
  });

  
  // add click event listener to reset button
  resetBtn.addEventListener('click', function() {
      transcription = '';
      transcriptionField.value = '';
      recognition.stop();
      console.log('Recognition stopped');
      resetBtn.style.display = 'none';
  });
</script>

<script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote();
        });
    </script>