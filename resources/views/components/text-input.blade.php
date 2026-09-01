@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]']) }}>