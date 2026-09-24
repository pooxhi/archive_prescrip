<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Something Went Wrong | OptiArchive</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#EEEEEE] text-gray-900">
    <main class="flex min-h-screen items-center justify-center px-6 py-12">
        <div class="w-full max-w-lg text-center">

            <p class="text-sm font-semibold uppercase tracking-widest text-[#2FA084]">
                OptiArchive
            </p>

            <h1 class="mt-4 text-7xl font-bold text-[#1F6F5F]">
                500
            </h1>

            <h2 class="mt-4 text-2xl font-bold">
                Something went wrong
            </h2>

            <p class="mx-auto mt-3 max-w-md text-sm leading-6 text-gray-500">
                An unexpected error occurred while processing your request.
                Please try again later.
            </p>

            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                <a
                    href="{{ url('/') }}"
                    class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
                >
                    Go to Home
                </a>

                <button
                    type="button"
                    onclick="window.location.reload()"
                    class="rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 ring-1 ring-gray-200 transition hover:bg-gray-50"
                >
                    Try Again
                </button>
            </div>

        </div>
    </main>
</body>
</html>