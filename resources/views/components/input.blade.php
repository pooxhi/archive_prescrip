@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
])

<div class="space-y-2">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-slate-700">
            {{ $label }}
            @if($required)
                <span class="text-[#2FA084]">*</span>
            @endif
        </label>
    @endif

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        {{ $attributes->merge([
            'class' => 'block w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.75 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#2FA084] focus:ring-2 focus:ring-[#2FA084]/10'
        ]) }}
    >
</div>
