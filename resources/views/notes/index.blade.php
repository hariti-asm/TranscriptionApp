@if ($errors->get('upload'))
    <p>
        {{ $errors->get('upload')[0] }}
    </p>
@endif

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('notes.store') }}">
            @csrf
        <input name="upload" type="file" accept="audio/x-aiff, audio/flac, audio/mpeg, audio/ogg, audio/wav, audio/mp3" />

            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <button type="submit">upload</button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            {{-- <span class="text-gray-800">{{ $note->user->name }}</span> --}}

            @foreach ($notes as $note)
                <div class="p-2 flex space-x-2">

                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                {{-- <small class="ml-2 text-sm text-gray-600">{{ $note->created_at->format('j M Y, g:i a') }}</small> --}}
                                <p class="ml-4 text-xs text-gray-900">{{ $note->upload }}</p>
                                <audio controls>
                                    {{-- <source src="{{ asset('../uploads/' . $note->upload) }}" > --}}
                                </audio>
                            </div>


                                <div>

                                        {{-- <form method="POST"  class="flex" action="{{ route('notes.destroy', $note) }}" >
                                            @csrf
                                            <x-dropdown-link :href="route('notes.destroy', $note)" onclick="event.preventDefault(); this.closest('form').submit();" class="bg-blue-600">
                                                {{ __('Transcribe') }}
                                            </x-dropdown-link>
                                            @method('delete')
                                            <x-dropdown-link :href="route('notes.destroy', $note)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>

                                        </form> --}}
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
