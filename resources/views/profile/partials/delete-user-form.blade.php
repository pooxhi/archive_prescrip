<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    @if ($user->prescriptions()->exists())
        <div class="rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">
            Your account cannot be deleted because it is associated with existing prescription records.
        </div>

        <x-danger-button
            type="button"
            disabled
            class="cursor-not-allowed opacity-50"
        >
            Delete Account
        </x-danger-button>
    @else
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            Delete Account
        </x-danger-button>
    @endif

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted.
                Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <div class="mt-6">
                <x-input-label
                    for="password"
                    value="{{ __('Password') }}"
                    class="sr-only"
                />

                <div
                    class="relative w-3/4"
                    x-data="{ show: false }"
                >
                    <x-text-input
                        id="password"
                        name="password"
                        ::type="show ? 'text' : 'password'"
                        class="mt-1 block w-full pe-12"
                        placeholder="{{ __('Password') }}"
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
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Delete Account
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>