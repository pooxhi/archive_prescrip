@extends('layouts.app')

@section('title', 'Prescription | OptiArchive')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            Prescription
        </h1>

        <p class="text-sm text-gray-500">
            Reference #{{ $prescription->reference_number ?? 'N/A' }}
        </p>
    </div>

    @if (session('success'))
        <div class="rounded-lg bg-green-100 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-xl bg-white p-6 shadow">

        <h2 class="text-lg font-semibold">General Information</h2>

        <div class="mt-4 space-y-2">
            <p>
                <strong>Customer:</strong>
                {{ $prescription->customer }}
            </p>

            <p>
                <strong>Address:</strong>
                {{ $prescription->address ?? 'N/A' }}
            </p>

            <p>
                <strong>Date:</strong>
                {{ $prescription->prescription_date->format('F j, Y') }}
            </p>

            <p>
                <strong>Reference #:</strong>
                {{ $prescription->reference_number ?? 'N/A' }}
            </p>

            <p>
                <strong>Amount Due:</strong>
                {{ $prescription->amount_due !== null
                    ? number_format((float) $prescription->amount_due, 2)
                    : 'N/A' }}
            </p>
        </div>

        <h2 class="mt-8 text-lg font-semibold">
            Prescription Details
        </h2>

        <div class="mt-4 space-y-2">

            <h3 class="font-medium">Right Eye</h3>

            <p>
                SPH: {{ $prescription->right_sphere ?? 'N/A' }}
            </p>

            <p>
                CYL: {{ $prescription->right_cylinder ?? 'N/A' }}
            </p>

            <p>
                Axis: {{ $prescription->right_axis ?? 'N/A' }}
            </p>

            <p>
                ADD: {{ $prescription->right_add ?? 'N/A' }}
            </p>

            <h3 class="mt-6 font-medium">Left Eye</h3>

            <p>
                SPH: {{ $prescription->left_sphere ?? 'N/A' }}
            </p>

            <p>
                CYL: {{ $prescription->left_cylinder ?? 'N/A' }}
            </p>

            <p>
                Axis: {{ $prescription->left_axis ?? 'N/A' }}
            </p>

            <p>
                ADD: {{ $prescription->left_add ?? 'N/A' }}
            </p>

            <h3 class="mt-6 font-medium">Other Details</h3>

            <p>
                PD: {{ $prescription->pd ?? 'N/A' }}
            </p>

            <p>
                <strong>Notes:</strong><br>
                {{ $prescription->notes ?? 'No notes' }}
            </p>

        </div>
    </div>

    <div class="flex gap-3">

    <a
        href="{{ route('prescriptions.index') }}"
        class="inline-block rounded-lg bg-gray-200 px-4 py-2"
    >
        Back to Prescriptions
    </a>

    <a
        href="{{ route('prescriptions.edit', $prescription) }}"
        class="inline-block rounded-lg bg-[#2FA084] px-4 py-2 text-white"
    >
        Edit Prescription
    </a>

    <form
        method="POST"
        action="{{ route('prescriptions.destroy', $prescription) }}"
        onsubmit="return confirm('Are you sure you want to delete this prescription?');"
    >
        @csrf
        @method('DELETE')

            <button
                type="submit"
                class="rounded-lg bg-red-600 px-4 py-2 text-white"
            >
                Delete
            </button>
        </form>

    </div>

</div>
@endsection