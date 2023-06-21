<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />





<main class="max-w-lg mx-auto mt-12 px-8">
	<h1 class="text-center mb-6 font-semibold text-5xl">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
		<div class="space-y-2">
			<label class="label text-xl" for="email" :value="__('Email')"> <span>Email</span></label>
			<input
				name="email"
				type="email"
				id="email"
				placeholder="Email"

				class="input w-full rounded-full border-gray-200 text-xl"
                :value="old('email')"
                required autofocus autocomplete="username"
			/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

		</div>
		<div class="space-y-2">
			<label class="label text-xl" for="password" :value="__('Password')">
				<span>Password</span>
			</label>

			<input
				name="password"
				type="password"
				id="password"
				placeholder="********"
				required
				minLength={6}
                required autocomplete="current-password"
				class="input w-full rounded-full border-gray-200"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />


		</div>


        <div class="flex i flex-col tems-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
			<button class="btn btn-success rounded-full w-full mt-3" type="submit">Login</button>

        </div>
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
	</form>
</main>

</x-guest-layout>
