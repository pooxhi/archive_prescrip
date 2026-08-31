@props([
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50';
    $variants = [
        'primary' => 'bg-[#2FA084] text-white hover:bg-[#1F6F5F] focus:ring-[#2FA084]/30',
        'secondary' => 'bg-[#EEEEEE] text-[#1F6F5F] hover:bg-[#6FCF97]/25 focus:ring-[#2FA084]/20',
        'ghost' => 'text-slate-600 hover:bg-[#EEEEEE] hover:text-[#1F6F5F] focus:ring-slate-200',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500/30',
    ];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $base . ' ' . ($variants[$variant] ?? $variants['primary'])]) }}>
    {{ $slot }}
</button>
