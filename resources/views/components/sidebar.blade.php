<aside
    class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col bg-[#1F6F5F] text-white shadow-2xl shadow-[#1F6F5F]/10 transition-transform duration-300 ease-out lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>
    <div class="flex h-20 items-center border-b border-white/10 px-6">
        <a href="{{ route('dashboard') }}" class="flex min-w-0 items-center gap-3">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12Z"/>
                    <circle cx="12" cy="12" r="2.75"/>
                </svg>
            </div>

            <div class="min-w-0">
                <h1 class="font-heading truncate text-[15px] font-semibold tracking-tight">
                    OptiArchive
                </h1>
                <p class="truncate text-xs text-white/55">
                    Optical Clinic System
                </p>
            </div>
        </a>

        <button
            type="button"
            class="ml-auto rounded-lg p-2 text-white/65 transition hover:bg-white/10 hover:text-white lg:hidden"
            aria-label="Close navigation"
            @click="sidebarOpen = false"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6">
        <p class="mb-3 px-3 text-[10px] font-semibold uppercase tracking-[0.2em] text-white/40">
            Main
        </p>

        <div class="space-y-1.5">
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-white text-[#1F6F5F] shadow-sm' : 'text-white/78 hover:bg-white/10 hover:text-white' }}"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12h7V3H3v9Zm11 9h7v-9h-7v9ZM3 21h7v-5H3v5Zm11-18v5h7V3h-7Z"/>
                </svg>
                Dashboard
            </a>

            <a href="#" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-white/78 transition hover:bg-white/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 19a6 6 0 0 0-12 0m6-8a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm7-1v6m3-3h-6"/>
                </svg>
                Patients
            </a>

            <a href="#" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-white/78 transition hover:bg-white/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 3h8l4 4v14H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 3v5h5M9 13h6M9 17h4"/>
                </svg>
                Prescriptions
            </a>

            <a href="#" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-white/78 transition hover:bg-white/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7V5a1 1 0 0 1 1-1h2m11 3V5a1 1 0 0 0-1-1h-2M4 17v2a1 1 0 0 0 1 1h2m11-3v2a1 1 0 0 1-1 1h-2"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 12h10M12 7v10"/>
                </svg>
                OCR Scanner
                <span class="ml-auto rounded-full bg-[#6FCF97]/18 px-2 py-0.5 text-[9px] font-bold text-[#BFF2D0]">
                    AI
                </span>
            </a>
        </div>

        <p class="mb-3 mt-8 px-3 text-[10px] font-semibold uppercase tracking-[0.2em] text-white/40">
            Administration
        </p>

        <div class="space-y-1.5">
            <a href="#" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-white/78 transition hover:bg-white/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4" fill="none"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                Staff
            </a>

            <a href="#" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-white/78 transition hover:bg-white/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12h4l2-7 4 14 2-7h6"/>
                </svg>
                Activity Logs
            </a>

            <a href="#" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-white/78 transition hover:bg-white/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m19.14 12.94.04-.94-.04-.94 2.03-1.58-2-3.46-2.39.96a7.5 7.5 0 0 0-1.63-.94L14.8 3h-4l-.35 3.04a7.5 7.5 0 0 0-1.63.94l-2.39-.96-2 3.46 2.03 1.58-.04.94.04.94-2.03 1.58 2 3.46 2.39-.96c.5.39 1.04.7 1.63.94L10.8 21h4l.35-3.04c.59-.24 1.13-.55 1.63-.94l2.39.96 2-3.46-2.03-1.58Z"/>
                    <circle cx="12.8" cy="12" r="2.6"/>
                </svg>
                Settings
            </a>
        </div>
    </nav>

    <div class="border-t border-white/10 p-4">
        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-3">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#6FCF97] text-sm font-bold text-[#1F6F5F]">
                DS
            </div>
            <div class="min-w-0">
                <p class="truncate text-sm font-semibold">Dr. Santos</p>
                <p class="truncate text-xs text-white/50">Administrator</p>
            </div>
        </div>
    </div>
</aside>
