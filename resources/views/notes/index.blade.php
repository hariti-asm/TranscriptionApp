@if ($errors->get('upload'))
    <p>
        {{ $errors->get('upload')[0] }}
    </p>
@endif



<form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
    <!-- Laravel XSRF token injection -->
    @csrf

    <!-- Form field where the file will be selected -->
    <input name="upload" type="file" accept="audio/x-aiff, audio/flac, audio/mpeg, audio/ogg, audio/wav, audio/mp3" />

    <!-- Button to submit our form -->
    <button type="submit">Upload</button>

</form>
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        @foreach ($notes as $note)
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <p class="mt-4 text-lg text-gray-900">{{ $note->upload }}</p>
                        <div class="flex justify-between items-center">
                            <audio controls class="flex-1">
                                {{-- <source src="{{ asset('../uploads/' . $note->upload) }}"> --}}
                            </audio>
                            @if ($note->user->is(auth()->user()))
                                <form method="POST" action="{{ route('notes.destroy', $note) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();" class="your-button-styles">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="upload-wrapper body-small" role="presentation" tabindex="0"><input accept="audio/mp4,.mp4,.m4a,audio/mp3,.mp3,video/webm,.webm" type="file" tabindex="-1" style="display: none;"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="32px" width="32px" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg><h4 class="upload-title">Upload audio from computer</h4><p class="upload-subtitle">or drag and drop here</p><p class="upload-subtitle">(.mp4, .m4a, .mp3, .webm)</p></div>
