<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4" x-data="{ showPassword: false }">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative mt-1">
                <x-text-input
                    id="password"
                    class="block w-full pr-11"
                    x-bind:type="showPassword ? 'text' : 'password'"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <!-- Show / Hide Password -->
                <button
                    type="button"
                    x-on:click="showPassword = !showPassword"
                    x-bind:aria-label="showPassword ? 'Hide password' : 'Show password'"
                    x-bind:title="showPassword ? 'Hide password' : 'Show password'"
                    class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-3 text-gray-500 transition hover:text-[#1F6F5F] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#2FA084]"
                >
                    <!-- Eye icon: password hidden -->
                    <svg
                        x-show="!showPassword"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12Z"
                        />
                        <circle cx="12" cy="12" r="2.75" />
                    </svg>

                    <!-- Eye-off icon: password visible -->
                    <svg
                        x-show="showPassword"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.9 5.4A10.9 10.9 0 0 1 12 5.25c6 0 9.75 6.75 9.75 6.75a17.5 17.5 0 0 1-3.15 3.85M6.2 6.2C3.6 7.9 2.25 12 2.25 12s3.75 6.75 9.75 6.75c1.1 0 2.1-.2 3-.55"
                        />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-[#2FA084] shadow-sm focus:ring-[#2FA084]"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2FA084]"
                    href="{{ route('password.request') }}"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>