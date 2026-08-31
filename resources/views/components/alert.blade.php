@props([
    'type' => 'info',
])

@php
    $styles = [
        'info' => 'border-[#2FA084]/20 bg-[#2FA084]/8 text-[#1F6F5F]',
        'success' => 'border-[#6FCF97]/40 bg-[#6FCF97]/15 text-[#1F6F5F]',
        'warning' => 'border-amber-200 bg-amber-50 text-amber-800',
        'error' => 'border-red-200 bg-red-50 text-red-800',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'rounded-xl border px-4 py-3 text-sm ' . ($styles[$type] ?? $styles['info'])]) }}>
    {{ $slot }}
</div>
