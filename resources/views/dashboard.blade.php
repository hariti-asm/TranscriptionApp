<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @if ($errors->get('upload'))
    <p>
        {{ $errors->get('upload')[0] }}
    </p>
@endif




<!-- Open the modal using ID.showModal() method -->
<button class="btn " onclick="my_modal_4.showModal()">
  <span class="btn-label-wrap">
    <span class="btn-node">
      <svg
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
    </span>
  </span>
  </button>



  <dialog id="my_modal_4" class="modal">
    {{-- <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
        <!-- Laravel XSRF token injection -->
        @csrf

        <input name="upload" type="file" accept="audio/x-aiff, audio/flac, audio/mpeg, audio/ogg, audio/wav, audio/mp3"  />

        <button type="submit">Transcribe</button>

      </form> --}}
    <form method="dialog" class="modal-box w-11/12 max-w-5xl">
        <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
            <!-- Laravel XSRF token injection -->
            @csrf

            <input name="upload" type="file" accept="audio/x-aiff, audio/flac, audio/mpeg, audio/ogg, audio/wav, audio/mp3"  />

            <button type="submit">Transcribe</button>

          </form>
        <h4 class="upload-title ">Upload audio from computer</h4>
        <p class="upload-subtitle">or drag and drop here</p>
        <p class="upload-subtitle">(.mp4, .m4a, .mp3, .webm)</p>

        <p class="">or</p>
        <button tabindex="0" class="btn btn-full btn-md btn-filled btn-neutral stt-button stt-button-record" type="button"><span class="btn-label-wrap"><span class="btn-node"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg></span><span class="btn-label-inner">Start recording&zwj;</span></span></button>
      <div class="modal-action">
        <!-- if there is a button, it will close the modal -->
        <button class="btn">Close</button>
      </div>
    </form>
  </dialog>

</x-app-layout>
