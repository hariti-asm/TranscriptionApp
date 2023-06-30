<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" sm:rounded-lg">
                <div class=" text-gray-900 mx-auto">

                    <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-gray-600 text-center"
                >{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->get('upload'))
    <p>
        {{ $errors->get('upload')[0] }}
    </p>
@endif




<div class="mx-auto flex justify-center items-center ">
  <button class="btn btn-circle " onclick="my_modal_1.showModal()">
    <svg
      class="h-6 w-6"
      stroke="currentColor"
      fill="none"
      stroke-width="2"
      viewBox="0 0 24 24"
      stroke-linecap="round"
      stroke-linejoin="round"
      color="var(--primary)"
      width="1em"
      height="1em"
      xmlns="http://www.w3.org/2000/svg"
      style="color: var(--primary);"
    >
      <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path>
      <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
      <line x1="12" y1="19" x2="12" y2="23"></line>
      <line x1="8" y1="23" x2="16" y2="23"></line>
    </svg>
  </button>

</div>
  <dialog id="my_modal_1" class="modal">

    <div  class="modal-box w-full max-w[400px] rounded-sm">
      <p class="text-xl font-semibold">Speech to text </p>
      <div class=" border border-1 border-dashed mx-auto text-center mt-4 rounded-sm">

        <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data" class="mt-4">

            @csrf

            <input name="upload" type="file" accept="audio/x-aiff, audio/flac, audio/mpeg, audio/ogg, audio/wav, audio/mp3"  />

            <button type="submit">Upload</button>

          </form>
        <h4 class=" text-xl font-semibold mb-5 mt-3">Upload audio from computer</h4>
        <p class="">or drag and drop here</p>
        <p class=" mb-4">(.mp4, .m4a, .mp3, .webm)</p>
        </div>
        <div class="flex items-center pt-4 space-x-1">

        <div class="flex-1 h-px sm:w-16 bg-gray-100"></div>
        <p class="px-3 text-sm ">Or</p>
        <div class="flex-1 h-px sm:w-16 bg-gray-100"></div>
        </div>

            <button id="startButton" tabindex="0" class="btn bg-green-300 hover:btn-success rounded-sm w-full " type="button" onclick="startRecording()">
                <span class="flex">
                  <span class="btn-node">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line>
                    </svg>
                  </span>
                  <span id="startButtonText" class="btn-label-inner">Start recording&zwj;</span>
                </span>
              </button>

              <button id="stopButton" tabindex="0" class="btn bg-green-300 hover:btn-success  rounded-sm w-full  hidden" type="button" onclick="stopRecording()">
                <span class="flex">
                  <span class="btn-node">
                    <!-- Stop recording SVG code here -->
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line>
                    </svg>
                  </span>
                  <span id="stopButtonText" class="btn-label-inner">Stop recording&zwj;</span>
                </span>
              </button>

            <p id="timer" class="text-center text-xl mt-4"></p>
<div class="flex justify-between  ">
  <button type="submit" onclick="transcribe() " class="btn mt-6">transcribe</button>

      <div class="modal-action">
        <!-- if there is a button, it will close the modal -->
        <button class="btn " onclick="my_modal_1.close()">Close</button>
      </div>
    </div>
    </div>
  </dialog>



  <script>
    let mediaRecorder;
    let recordedChunks = [];
    let timerInterval;
    let isRecording = false;
    let lastRecordedSecond = 0;
    let totalRecordedSeconds = 0;

    function startRecording() {
      if (!isRecording) {
        navigator.mediaDevices.getUserMedia({ audio: true })
          .then(function (stream) {
            mediaRecorder = new MediaRecorder(stream);
            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.start();
            startTimer(); // Start the timer when recording starts
            updateButtonVisibility(true); // Show stop button, hide start button
            isRecording = true;
          })
          .catch(function (error) {
            console.log('Error accessing microphone:', error);
          });
        console.log("Started recording");
      } else {
        stopTimer();
        totalRecordedSeconds += lastRecordedSecond;
        startTimer();
      }
    }

    function stopRecording() {
      mediaRecorder.stop();
      stopTimer(); // Stop the timer when recording stops
      lastRecordedSecond = getCurrentSecond(); // Store the last recorded second
      totalRecordedSeconds += lastRecordedSecond; // Add to the total recorded seconds
      document.getElementById('timer').innerText = `Recording time: ${totalRecordedSeconds} seconds`; // Update displayed timer
      updateButtonVisibility(false); // Hide stop button, show start button
      isRecording = false;
      console.log("stop recording");
    }


    function handleDataAvailable(event) {
      if (event.data.size > 0) {
        recordedChunks.push(event.data);
      }
    }


    function startTimer() {
      let seconds = totalRecordedSeconds;
      timerInterval = setInterval(() => {
        seconds++;
        document.getElementById('timer').innerText = `Recording time: ${seconds} seconds`;
      }, 1000);
    }
    function stopTimer() {
      clearInterval(timerInterval);
    }

    function updateButtonVisibility(isRecording) {
      const startButton = document.getElementById('startButton');
      const stopButton = document.getElementById('stopButton');

      if (isRecording) {
        startButton.classList.add('hidden');
        stopButton.classList.remove('hidden');
      } else {
        startButton.classList.remove('hidden');
        stopButton.classList.add('hidden');
      }
    }

    function getCurrentSecond() {
      return parseInt(document.getElementById('timer').innerText.split(' ')[2]);
    }
    function transcribe(){
      console.log("transcribing....")
    }
  </script>
</x-app-layout>
