<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Access Denied | OptiArchive</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#EEEEEE]">

    <main class="flex min-h-screen items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <div class="mb-6 flex items-center justify-center">
                <a
                    href="{{ auth()->check() ? route('dashboard') : route('login') }}"
                    class="inline-flex items-center gap-3"
                >
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#1F6F5F] text-white shadow-sm">
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
                                d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12Z"
                            />
                            <circle cx="12" cy="12" r="2.75" />
                        </svg>
                    </div>

                    <div class="text-left">
                        <p class="font-heading text-sm font-semibold tracking-tight text-[#1F6F5F]">
                            OptiArchive
                        </p>

                        <p class="text-xs text-slate-400">
                            Optical Clinic System
                        </p>
                    </div>
                </a>
            </div>

            <div class="rounded-3xl bg-white px-6 py-8 text-center shadow-sm ring-1 ring-slate-200/70 sm:px-8 sm:py-10">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-red-50 text-red-600">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v4"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 17h.01"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.3 3.84 2.9 17a2 2 0 0 0 1.74 3h14.72a2 2 0 0 0 1.74-3L13.7 3.84a2 2 0 0 0-3.4 0Z"
                        />
                    </svg>
                </div>

                <p class="mt-6 text-xs font-bold uppercase tracking-[0.18em] text-red-600">
                    Error 403
                </p>

                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-[2.1rem]">
                    Access denied
                </h1>

                <p class="mx-auto mt-3 max-w-sm text-sm leading-6 text-slate-500">
                    You don't have permission to access this area of OptiArchive.
                </p>

                <div class="mt-7 flex justify-center">

                    @auth
                        <a
                            href="{{ route('dashboard') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
                        >
                            Back to Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
                        >
                            Go to Login
                        </a>
                    @endauth

                </div>

            </div>

            <p class="mt-5 text-center text-xs text-slate-400">
                &copy; {{ now()->year }} OptiArchive
            </p>

        </div>

    </main>

</body>
</html>