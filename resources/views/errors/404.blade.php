<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page Not Found | OptiArchive</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#EEEEEE]">

    <div class="flex min-h-screen items-center justify-center px-6 py-12">

        <div class="w-full max-w-lg text-center">

            {{-- Brand --}}
            <a
                href="{{ auth()->check() ? route('dashboard') : route('login') }}"
                class="inline-flex items-center gap-3"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#1F6F5F] text-white">
                    <svg
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
                            d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75-6.75-9.75-6.75S2.25 12 2.25 12Z"
                        />
                        <circle cx="12" cy="12" r="2.75" />
                    </svg>
                </div>

                <div class="text-left">
                    <p class="text-sm font-bold text-[#1F6F5F]">
                        OptiArchive
                    </p>

                    <p class="text-xs text-slate-400">
                        Optical Clinic System
                    </p>
                </div>
            </a>

            {{-- Error --}}
            <div class="mt-10 rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-100">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-[#EEEEEE] text-[#1F6F5F]">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 9h.01M15 9h.01M9.5 15a3.5 3.5 0 0 1 5 0M4.5 5.5A2.5 2.5 0 0 1 7 3h10a2.5 2.5 0 0 1 2.5 2.5v13A2.5 2.5 0 0 1 17 21H7a2.5 2.5 0 0 1-2.5-2.5v-13Z"
                        />
                    </svg>

                </div>

                <p class="mt-6 text-sm font-semibold text-[#2FA084]">
                    Error 404
                </p>

                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Page not found
                </h1>

                <p class="mt-3 text-sm leading-6 text-slate-500">
                    The page you're looking for doesn't exist or may have been moved.
                </p>

                <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">

                    @auth
                        <a
                            href="{{ route('dashboard') }}"
                            class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
                        >
                            Back to Dashboard
                        </a>

                        <a
                            href="{{ route('prescriptions.index') }}"
                            class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-[#EEEEEE]"
                        >
                            View Prescriptions
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
                        >
                            Go to Login
                        </a>
                    @endauth

                </div>

            </div>

            <p class="mt-6 text-xs text-slate-400">
                &copy; {{ now()->year }} OptiArchive
            </p>

        </div>

    </div>

</body>
</html>