<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F] focus:outline-none focus:ring-2 focus:ring-[#2FA084] focus:ring-offset-2 disabled:opacity-50']) }}>
    {{ $slot }}
</button>