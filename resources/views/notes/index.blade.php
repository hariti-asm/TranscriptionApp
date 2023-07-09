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
    <div>
        @foreach ($notes as $note)
            @auth

                <textarea class="textarea  textarea-success w-full mr-11 max-w-sm overflow-hidden resize-none">{{ $note->transcript }}

                </textarea>


            @else
                <p>Please login to view the transcribed text.</p>
            @endauth
        @endforeach
    </div>
</body>
</html>
