@php
    $user = Auth::user();

    $initials = collect(explode(' ', trim($user->name)))
        ->filter()
        ->map(fn ($name) => strtoupper(substr($name, 0, 1)))
        ->take(2)
        ->implode('');
@endphp

<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="flex h-20 items-center justify-between px-4 sm:px-6 lg:px-8">

        <!-- Left Side -->
        <div class="flex items-center gap-4">
            <button
                type="button"
                class="rounded-xl p-2.5 text-slate-600 transition hover:bg-[#EEEEEE] lg:hidden"
                aria-label="Open navigation"
                @click="sidebarOpen = true"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>

            <div class="hidden sm:block">
                <p class="text-xs font-medium text-slate-400">
                    Optical Clinic
                </p>

                <p class="text-sm font-semibold text-[#1F6F5F]">
                    Administration Portal
                </p>
            </div>
        </div>

        <!-- Right Side -->
        <div class="flex items-center gap-2 sm:gap-3">

            <div class="hidden h-8 w-px bg-slate-200 sm:block"></div>

            <!-- Profile Dropdown -->
            <div
                class="relative"
                x-data="{ profileOpen: false }"
            >
                <button
                    type="button"
                    class="flex items-center gap-3 rounded-xl px-2 py-1.5 text-left transition hover:bg-[#EEEEEE]"
                    @click="profileOpen = !profileOpen"
                    :aria-expanded="profileOpen"
                    aria-haspopup="true"
                >
                    <!-- Avatar -->
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#6FCF97] text-xs font-bold text-[#1F6F5F]">
                        {{ $initials }}
                    </div>

                    <!-- User Information -->
                    <div class="hidden sm:block">
                        <p class="text-sm font-semibold text-slate-700">
                            {{ $user->name }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ ucfirst($user->role) }}
                        </p>
                    </div>

                    <!-- Dropdown Arrow -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="hidden h-4 w-4 text-slate-400 transition duration-200 sm:block"
                        :class="profileOpen ? 'rotate-180' : ''"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m6 9 6 6 6-6"
                        />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div
                    x-show="profileOpen"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    @click.outside="profileOpen = false"
                    @keydown.escape.window="profileOpen = false"
                    x-cloak
                    class="absolute right-0 mt-2 w-52 origin-top-right overflow-hidden rounded-xl border border-slate-200 bg-white py-2 shadow-lg"
                >

                    <!-- Profile -->
                    <a
                        href="{{ route('profile.edit') }}"
                        class="block px-4 py-2.5 text-sm text-slate-700 transition hover:bg-[#EEEEEE]"
                    >
                        Profile
                    </a>

                    <!-- Divider -->
                    <div class="my-1 border-t border-slate-100"></div>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="block w-full px-4 py-2.5 text-left text-sm text-slate-700 transition hover:bg-[#EEEEEE]"
                        >
                            Log Out
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</header>