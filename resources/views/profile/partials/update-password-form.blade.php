<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form
        method="post"
        action="{{ route('password.update') }}"
        class="mt-6 space-y-6"
    >
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label
                for="update_password_current_password"
                :value="__('Current Password')"
            />

            <div
                class="relative mt-1"
                x-data="{ show: false }"
            >
                <x-text-input
                    id="update_password_current_password"
                    name="current_password"
                    ::type="show ? 'text' : 'password'"
                    class="block w-full pe-12"
                    autocomplete="current-password"
                />

                <button
                    type="button"
                    @click="show = !show"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 transition hover:text-[#1F6F5F]"
                    :aria-label="show ? 'Hide password' : 'Show password'"
                >
                    <svg
                        x-show="!show"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12Z"
                        />
                        <circle cx="12" cy="12" r="2.75" />
                    </svg>

                    <svg
                        x-show="show"
                        x-cloak
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3l18 18"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.58 10.58a2 2 0 0 0 2.84 2.84"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.88 5.09A10.94 10.94 0 0 1 12 4.75c6 0 9.75 7.25 9.75 7.25a17.54 17.54 0 0 1-3.04 3.8"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.27 6.27C3.72 8.18 2.25 12 2.25 12s3.75 7.25 9.75 7.25c1.5 0 2.87-.32 4.09-.84"
                        />
                    </svg>
                </button>
            </div>

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label
                for="update_password_password"
                :value="__('New Password')"
            />

            <div
                class="relative mt-1"
                x-data="{ show: false }"
            >
                <x-text-input
                    id="update_password_password"
                    name="password"
                    ::type="show ? 'text' : 'password'"
                    class="block w-full pe-12"
                    autocomplete="new-password"
                />

                <button
                    type="button"
                    @click="show = !show"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 transition hover:text-[#1F6F5F]"
                    :aria-label="show ? 'Hide password' : 'Show password'"
                >
                    <svg
                        x-show="!show"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12Z"
                        />
                        <circle cx="12" cy="12" r="2.75" />
                    </svg>

                    <svg
                        x-show="show"
                        x-cloak
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3l18 18"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.58 10.58a2 2 0 0 0 2.84 2.84"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.88 5.09A10.94 10.94 0 0 1 12 4.75c6 0 9.75 7.25 9.75 7.25a17.54 17.54 0 0 1-3.04 3.8"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.27 6.27C3.72 8.18 2.25 12 2.25 12s3.75 7.25 9.75 7.25c1.5 0 2.87-.32 4.09-.84"
                        />
                    </svg>
                </button>
            </div>

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirm Password')"
            />

            <div
                class="relative mt-1"
                x-data="{ show: false }"
            >
                <x-text-input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    ::type="show ? 'text' : 'password'"
                    class="block w-full pe-12"
                    autocomplete="new-password"
                />

                <button
                    type="button"
                    @click="show = !show"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 transition hover:text-[#1F6F5F]"
                    :aria-label="show ? 'Hide password' : 'Show password'"
                >
                    <svg
                        x-show="!show"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75-9.75-6.75-9.75-6.75Z"
                        />
                        <circle cx="12" cy="12" r="2.75" />
                    </svg>

                    <svg
                        x-show="show"
                        x-cloak
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3l18 18"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.58 10.58a2 2 0 0 0 2.84 2.84"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.88 5.09A10.94 10.94 0 0 1 12 4.75c6 0 9.75 7.25 9.75 7.25s-3.75 7.25-9.75 7.25c-1.5 0-2.87-.32-4.09-.84"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.27 6.27C3.72 8.18 2.25 12 2.25 12s3.75 7.25 9.75 7.25c1.5 0 2.87-.32 4.09-.84"
                        />
                    </svg>
                </button>
            </div>

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>