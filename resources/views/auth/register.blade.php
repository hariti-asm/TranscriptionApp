<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" :value="__('Name')" class="label text-xl"><span> Name</span>


            </label>
            <input id="name" class="input w-full rounded-full border-gray-200 text-xl"
            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">


                <label class="label text-xl" for="email" :value="__('Email')">
                                       <span>Email</span>
                </label>
			<input
				name="email"
				type="email"
				id="email"
				placeholder="Email"

				class="input w-full rounded-full border-gray-200 text-xl"
                :value="old('email')"
                required  autocomplete="username"
			/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

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
                required autocomplete="new-password"
				class="input w-full rounded-full border-gray-200"/>


            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">




                <label class="label text-xl" for="password" :value="__(' Confirm Password')">
                    <span>Confirm Password</span>
                </label>

                <input
                    name=" password_confirmation"
                    type="password"
                    id="password_confirmation"
                    placeholder="********"
                    required
                    minLength={6}
                    required autocomplete="new-password"
                    class="input w-full rounded-full border-gray-200"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        </div>

        <div class="flex flex-col items-center justify-end mt-4">

			<button class="btn btn-success rounded-full w-full mt-3 ml-4" type="submit"> Register</button>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
