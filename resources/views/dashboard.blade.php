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
<div class="mx-auto flex justify-center">
  <button class="btn btn-circle" onclick="my_modal_1.showModal()">
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

        <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">

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
        <p class="px-3 text-sm ">or</p>
        <div class="flex-1 h-px sm:w-16 bg-gray-100"></div>
        </div>
        <button tabindex="0" class="btn bg-green-300 hover:btn-success rounded-sm w-full" type="button">
          <span class="flex"><span class="btn-node">
            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg></span><span class="btn-label-inner">Start recording&zwj;</span></span></button>
      <div class="modal-action">
        <!-- if there is a button, it will close the modal -->
        <button class="btn " onclick="my_modal_1.close()">Close</button>
      </div>
    </div>
  </dialog>

</x-app-layout>
