<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        @vite('resources/js/app.js')
        @vite('resources/css/app.css')
    </head>
    <body >
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class=" h-full mx-auto flex flex-col justify-center items-center">
                <h1 class="text-6xl font-semibold">Audio<span class="text-success">Scribe</span></h1>
                <p class="text-3xl pt-10 font-semibold italic ">
                    transform your voice to clear words just in seconds
                </p>
                <p class="text-2xl ">Just hit record. Then start rambling AudioScribe</p>
                <p class="text-2xl mr-52 ">will clean things up when you're done.</p>
                <div class="mt-10">
                    <a  href="{{ route('dashboard') }}"
                     class="btn btn-success rounded-full w-full font-sans text-xl">Get started</a>

                </div>
                <footer class="px-4 py-8 text-gray-600 w-full">
                    <div
                        class="container flex flex-wrap items-center justify-center mx-auto space-y-4 sm:justify-between sm:space-y-0"
                    >
                        {{-- <div class="flex flex-row pr-3 space-x-4 sm:space-x-8">

                            <ul class="flex flex-wrap items-center space-x-4 sm:space-x-8">
                                <li>
                                    <a rel="noopener noreferrer" href="#">Terms of Use</a>
                                </li>
                                <li>
                                    <a rel="noopener noreferrer" href="#">Privacy</a>
                                </li>
                            </ul>
                        </div> --}}

                    </div>
                </footer>
            </div>

        </div>

    </body>
</html>
