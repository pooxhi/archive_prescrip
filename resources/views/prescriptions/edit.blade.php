@extends('layouts.app')

@section('title', 'Edit Prescription | OptiArchive')

@section('content')
@if ($errors->any()) <div class="mb-4 rounded-lg bg-red-100 px-4 py-3 text-sm text-red-800"> <ul class="list-disc pl-5">
@foreach ($errors->all() as $error) <li>{{ $error }}</li>
@endforeach </ul> </div>
@endif

<div class="mx-auto max-w-5xl space-y-6">

```
{{-- Header --}}
<div>
    <p class="text-sm font-semibold text-[#2FA084]">
        Prescription Archive
    </p>

    <h1 class="mt-1 text-2xl font-bold text-gray-900">
        Edit Prescription
    </h1>

    <p class="mt-1 text-sm text-gray-500">
        {{ $prescription->customer }} &middot; Reference #{{ $prescription->reference_number ?? 'N/A' }}
    </p>
</div>

{{-- Form --}}
<form method="POST"
      action="{{ route('prescriptions.update', $prescription) }}"
      class="space-y-6">

    @csrf
    @method('PUT')

    {{-- General Information --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">

        <h2 class="text-lg font-semibold text-gray-900">
            General Information
        </h2>

        <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">

            {{-- Customer --}}
            <div>
                <label for="customer"
                       class="block text-sm font-medium text-gray-700">
                    Customer
                </label>

                <input
                    type="text"
                    id="customer"
                    name="customer"
                    value="{{ old('customer', $prescription->customer) }}"
                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                >

                @error('customer')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label for="address"
                       class="block text-sm font-medium text-gray-700">
                    Address
                </label>

                <input
                    type="text"
                    id="address"
                    name="address"
                    value="{{ old('address', $prescription->address) }}"
                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                >
            </div>

            {{-- Date --}}
            <div>
                <label for="date"
                       class="block text-sm font-medium text-gray-700">
                    Date
                </label>

                <input
                    type="date"
                    id="date"
                    name="date"
                    value="{{ old('date', $prescription->prescription_date->format('Y-m-d')) }}"
                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                >
            </div>

            {{-- Reference Number --}}
            <div>
                <label for="reference_number"
                       class="block text-sm font-medium text-gray-700">
                    Reference #
                </label>

                <input
                    type="text"
                    id="reference_number"
                    name="reference_number"
                    value="{{ old('reference_number', $prescription->reference_number) }}"
                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                >
            </div>

        </div>
    </div>

    {{-- Prescription Details --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">

        <h2 class="text-lg font-semibold text-gray-900">
            Prescription Details
        </h2>

        {{-- Right Eye --}}
        <div class="mt-6">

            <h3 class="text-sm font-semibold text-gray-700">
                Right Eye
            </h3>

            <div class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-3">

                {{-- SPH --}}
                <div>
                    <label for="right_sph"
                           class="block text-sm font-medium text-gray-700">
                        SPH
                    </label>

                    <input
                        type="number"
                        id="right_sph"
                        name="right_sph"
                        value="{{ old('right_sph', $prescription->right_sphere) }}"
                        step="0.01"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('right_sph')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CYL --}}
                <div>
                    <label for="right_cyl"
                           class="block text-sm font-medium text-gray-700">
                        CYL
                    </label>

                    <input
                        type="number"
                        id="right_cyl"
                        name="right_cyl"
                        value="{{ old('right_cyl', $prescription->right_cylinder) }}"
                        step="0.01"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('right_cyl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Axis --}}
                <div>
                    <label for="right_axis"
                           class="block text-sm font-medium text-gray-700">
                        Axis
                    </label>

                    <input
                        type="number"
                        id="right_axis"
                        name="right_axis"
                        value="{{ old('right_axis', $prescription->right_axis) }}"
                        min="0"
                        max="180"
                        step="1"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('right_axis')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Left Eye --}}
        <div class="mt-8">

            <h3 class="text-sm font-semibold text-gray-700">
                Left Eye
            </h3>

            <div class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-3">

                {{-- SPH --}}
                <div>
                    <label for="left_sph"
                           class="block text-sm font-medium text-gray-700">
                        SPH
                    </label>

                    <input
                        type="number"
                        id="left_sph"
                        name="left_sph"
                        value="{{ old('left_sph', $prescription->left_sphere) }}"
                        step="0.01"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('left_sph')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CYL --}}
                <div>
                    <label for="left_cyl"
                           class="block text-sm font-medium text-gray-700">
                        CYL
                    </label>

                    <input
                        type="number"
                        id="left_cyl"
                        name="left_cyl"
                        value="{{ old('left_cyl', $prescription->left_cylinder) }}"
                        step="0.01"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('left_cyl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Axis --}}
                <div>
                    <label for="left_axis"
                           class="block text-sm font-medium text-gray-700">
                        Axis
                    </label>

                    <input
                        type="number"
                        id="left_axis"
                        name="left_axis"
                        value="{{ old('left_axis', $prescription->left_axis) }}"
                        min="0"
                        max="180"
                        step="1"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('left_axis')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ADD --}}
        <div class="mt-8">

            <h3 class="text-sm font-semibold text-gray-700">
                ADD
            </h3>

            <div class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2">

                {{-- Right Eye ADD --}}
                <div>
                    <label for="right_add"
                           class="block text-sm font-medium text-gray-700">
                        Right Eye ADD
                    </label>

                    <input
                        type="number"
                        id="right_add"
                        name="right_add"
                        value="{{ old('right_add', $prescription->right_add) }}"
                        step="0.01"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('right_add')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Left Eye ADD --}}
                <div>
                    <label for="left_add"
                           class="block text-sm font-medium text-gray-700">
                        Left Eye ADD
                    </label>

                    <input
                        type="number"
                        id="left_add"
                        name="left_add"
                        value="{{ old('left_add', $prescription->left_add) }}"
                        step="0.01"
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >

                    @error('left_add')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- PD --}}
        <div class="mt-8">

            <label for="pd"
                   class="block text-sm font-semibold text-gray-700">
                PD
            </label>

            <div class="mt-3 max-w-xs">

                <input
                    type="text"
                    id="pd"
                    name="pd"
                    value="{{ old('pd', $prescription->pd) }}"
                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                >

                @error('pd')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>
        </div>

        {{-- Notes --}}
        <div class="mt-8">

            <label for="notes"
                   class="block text-sm font-semibold text-gray-700">
                Notes
            </label>

            <textarea
                id="notes"
                name="notes"
                rows="4"
                class="mt-3 block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
            >{{ old('notes', $prescription->notes) }}</textarea>

        </div>

        {{-- Amount Due --}}
        <div class="mt-8">

            <label for="amount_due"
                   class="block text-sm font-semibold text-gray-700">
                Amount Due
            </label>

            <div class="mt-3 max-w-xs">

                <input
                    type="number"
                    id="amount_due"
                    name="amount_due"
                    value="{{ old('amount_due', $prescription->amount_due) }}"
                    min="0"
                    step="0.01"
                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                >

                @error('amount_due')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>
        </div>

    </div>

    {{-- Actions --}}
    <div class="flex items-center justify-end gap-3">

        <a href="{{ route('prescriptions.show', $prescription) }}"
           class="rounded-xl px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-100">
            Cancel
        </a>

        <button
            type="submit"
            class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
        >
            Update Prescription
        </button>

    </div>

</form>
```

</div>
@endsection
