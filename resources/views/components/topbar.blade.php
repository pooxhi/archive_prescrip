<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="flex h-20 items-center justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4">
            <button
                type="button"
                class="rounded-xl p-2.5 text-slate-600 transition hover:bg-[#EEEEEE] lg:hidden"
                aria-label="Open navigation"
                @click="sidebarOpen = true"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="hidden sm:block">
                <p class="text-xs font-medium text-slate-400">Optical Clinic</p>
                <p class="text-sm font-semibold text-[#1F6F5F]">Administration Portal</p>
            </div>
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
            <div class="relative hidden md:block">
                <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.1-5.4a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z"/>
                </svg>
                <input
                    type="search"
                    placeholder="Search..."
                    class="w-56 rounded-xl border border-slate-200 bg-[#EEEEEE]/60 py-2.5 pl-9 pr-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-[#2FA084] focus:ring-2 focus:ring-[#2FA084]/10"
                >
            </div>

            <button type="button" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-[#EEEEEE] hover:text-[#1F6F5F]" aria-label="Notifications">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17H9m10-1V10a7 7 0 1 0-14 0v6l-2 2h18l-2-2Z"/>
                </svg>
                <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-[#2FA084] ring-2 ring-white"></span>
            </button>

            <div class="hidden h-8 w-px bg-slate-200 sm:block"></div>

            <button type="button" class="flex items-center gap-3 rounded-xl px-2 py-1.5 text-left transition hover:bg-[#EEEEEE]">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#6FCF97] text-xs font-bold text-[#1F6F5F]">
                    DS
                </div>
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold text-slate-700">Dr. Santos</p>
                    <p class="text-xs text-slate-400">Administrator</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-4 w-4 text-slate-400 sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6"/>
                </svg>
            </button>
        </div>
    </div>
</header>
