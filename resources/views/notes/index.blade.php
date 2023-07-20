
<x-app-layout>
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
    <div class="">
        @foreach ($notes as $note)
            @auth
                <div class="flex space-x-4">
                    <div  class=" focus:border-spacing-2    focus:border-success w-full  max-w-[400px] overflow-hidden  my-1 border border-success rounded-md h-full  " readonly >{{ $note->transcript }}
                        <div class="flex justify-end mb-2 mr-2  " onclick="copyText('{{ htmlspecialchars($note->transcript) }}')">


                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2cce88" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-trash-2  ">
                         <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17" /></svg>

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2cce88" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-files"><path d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z"/><path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8"/><path d="M15 2v5h5"/></svg>
                    </div>

                </div>
                <div  class=" focus:border-spacing-2    focus:border-success w-full  max-w-[400px] overflow-hidden  my-1 border border-success rounded-md h-full  " readonly >{{ $note->transcript }}
                    <div class="flex justify-end mb-2 mr-2" onclick="copyText('{{ htmlspecialchars($note->transcript) }}')">


                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2cce88" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17" /></svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2cce88" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-files"><path d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z"/><path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8"/><path d="M15 2v5h5"/></svg>
                </div>

            </div>
            <div  class=" focus:border-spacing-2    focus:border-success w-full  max-w-[400px] overflow-hidden  my-1 border border-success rounded-md h-full  " readonly >{{ $note->transcript }}
                <div class="flex justify-end mb-2 mr-2" onclick="copyText('{{ htmlspecialchars($note->transcript) }}')">


                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2cce88" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17" /></svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2cce88" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-files"><path d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z"/><path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8"/><path d="M15 2v5h5"/></svg>
            </div>

        </div>
                </div>




                </button>
            @else
                <p>Please login to view the transcribed text.</p>
            @endauth
        @endforeach
    </div>
    <script>
        function copyText(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);

            // Create and display the "Note copied!" message
            const messageElement = document.createElement('p');
            messageElement.textContent = "Note copied!";
            messageElement.classList.add("text-sm", "text-black", "text-center");
            document.body.appendChild(messageElement);

            // Remove the message after 1 second (1000 milliseconds)
            setTimeout(() => {
                document.body.removeChild(messageElement);
            }, 3000);

            console.log('Note copied to clipboard!');
        }
    </script>
</body>
</html>
</x-app-layout>
