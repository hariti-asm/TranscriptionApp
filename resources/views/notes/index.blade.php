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
    <h1 class="text-center mt-6 mb-6">Your Notes</h1>
    <div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr>
                <th>Audio</th>
                <th>Note</th>
                <th>Delete</th>
                <th>Transcribe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>
                        <audio controls>
                            <source src="{{ Storage::url('uploads/' . $note->upload) }}">
                        </audio>

                    </td>

                    <td>
                        {{ $note->upload }}
                    </td>
                    <td>
                        @if ($note->user->is(auth()->user()))
                            <form method="POST" action="{{ route('notes.destroy', $note) }}" class="flex gap-4">
                                @csrf
                                @method('delete')

                                <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();"  class="rounded-full  text-center mx-auto  max-h-6 py-1 px-4 -ml-2  btn-success ">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if ($note->user->is(auth()->user()))
                            <form method="POST" action="{{ route('notes.store', $note) }}" class="flex gap-4">
                                @csrf
                                <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();"  class="rounded-full  text-center mx-auto  max-h-6 py-1 px-3 -ml-2  btn-success ">
                                    {{ __('Transcribe') }}
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
