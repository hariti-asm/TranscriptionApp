<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>

            <div class="space-y-2">
                <label class="label text-xl"  for="current_password" :value="__('Current Password')" >
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
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />



            </div>


        <div>
            <label for="password" :value="__('New Password')"class="label text-xl"  ></label>
            <input id="password" name="password" type="password"  class="input w-full rounded-full border-gray-200" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" :value="__('Confirm Password')" class="label text-xl" ></label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="input w-full rounded-full border-gray-200"  autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-success rounded-full mt-4">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
