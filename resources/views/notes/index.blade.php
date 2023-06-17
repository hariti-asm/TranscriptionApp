<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/js/app.js') --}}
    @vite('resources/css/app.css')

</head>
<body>




    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        @foreach ($notes as $note)
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div >
                        <p class="mt-4 text-xm text-gray-900">{{ $note->upload }}</p>
                        <div class="flex justify-between" >
                            <audio controls>
                            <source src="{{ Storage::url('uploads/' . $note->upload) }}">

                            </audio>
                            @if ($note->user->is(auth()->user()))
                                <form method="POST" action="{{ route('notes.destroy', $note) }}" class="flex gap-4">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();" class="your-button-styles">
                                        {{ __('Delete') }}
                                    </button>
                                    <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();" class="your-button-styles">
                                        {{ __('Transcribe') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



</body>
</html>
