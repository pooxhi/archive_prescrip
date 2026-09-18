@extends('layouts.app')

@section('title', 'Prescription | OptiArchive')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header --}}
    <div>
        <p class="text-sm font-semibold text-[#2FA084]">
            Prescription Archive
        </p>

        <h1 class="mt-1 text-2xl font-bold text-gray-900">
            {{ $prescription->customer }}
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Reference #{{ $prescription->reference_number ?? 'N/A' }} &middot; {{ $prescription->prescription_date->format('F j, Y') }}
        </p>
    </div>

    {{-- General Information --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">

        <h2 class="text-lg font-semibold text-gray-900">
            General Information
        </h2>

        <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">

            <div>
                <p class="text-sm font-medium text-gray-500">Customer</p>
                <p class="mt-1 text-sm text-gray-900">{{ $prescription->customer }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Address</p>
                <p class="mt-1 text-sm text-gray-900">{{ $prescription->address ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Date</p>
                <p class="mt-1 text-sm text-gray-900">{{ $prescription->prescription_date->format('F j, Y') }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Reference #</p>
                <p class="mt-1 text-sm text-gray-900">{{ $prescription->reference_number ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Amount Due</p>
                <p class="mt-1 text-sm text-gray-900">
                    {{ $prescription->amount_due !== null
                        ? number_format((float) $prescription->amount_due, 2)
                        : 'N/A' }}
                </p>
            </div>

        </div>
    </div>

    {{-- Prescription Details --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">

        <h2 class="text-lg font-semibold text-gray-900">
            Prescription Details
        </h2>

        {{-- Right vs Left Eye comparison table --}}
        <div class="mt-5 overflow-x-auto">
            <table class="w-full min-w-[420px] text-left">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="py-2 pr-4 text-xs font-semibold uppercase tracking-wide text-gray-500">Eye</th>
                        <th class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-500">SPH</th>
                        <th class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-500">CYL</th>
                        <th class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-500">Axis</th>
                        <th class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-500">ADD</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="py-3 pr-4 text-sm font-semibold text-gray-900">Right</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->right_sphere ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->right_cylinder ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->right_axis ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->right_add ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="py-3 pr-4 text-sm font-semibold text-gray-900">Left</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->left_sphere ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->left_cylinder ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->left_axis ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $prescription->left_add ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Other Details --}}
        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

            <div>
                <p class="text-sm font-medium text-gray-500">PD</p>
                <p class="mt-1 text-sm text-gray-900">{{ $prescription->pd ?? 'N/A' }}</p>
            </div>

        </div>

        <div class="mt-6">
            <p class="text-sm font-medium text-gray-500">Notes</p>
            <p class="mt-1 whitespace-pre-line text-sm text-gray-900">{{ $prescription->notes ?? 'No notes' }}</p>
        </div>

    </div>

    {{-- Actions --}}
    <div class="flex items-center justify-between">

        <a href="{{ route('prescriptions.index') }}"
           class="rounded-xl px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-100">
            &larr; Back to Prescriptions
        </a>

        <div class="flex items-center gap-3">

            <a
                href="{{ route('prescriptions.edit', $prescription) }}"
                class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
            >
                Edit Prescription
            </a>

            <form
                method="POST"
                action="{{ route('prescriptions.destroy', $prescription) }}"
                onsubmit="return confirm('Are you sure you want to delete this prescription? This cannot be undone.');"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-xl border border-red-200 px-5 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-50"
                >
                    Delete
                </button>
            </form>

        </div>

    </div>

</div>
@endsection