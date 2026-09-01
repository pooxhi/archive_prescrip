@extends('layouts.app')

@section('title', 'Prescriptions | OptiArchive')

@section('content')

@if (session('success'))
    <div class="mx-auto mb-4 max-w-7xl rounded-xl bg-green-100 px-4 py-3 text-sm font-medium text-green-800">
        {{ session('success') }}
    </div>
@endif

<div class="mx-auto max-w-7xl space-y-6">

    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Prescriptions
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    View and manage prescription records.
                </p>
            </div>

            <a
                href="{{ route('prescriptions.create') }}"
                class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
            >
                New Prescription
            </a>
        </div>

        <form method="GET" action="{{ route('prescriptions.index') }}">
            <div class="grid gap-3 md:grid-cols-4">

                <div>
                    <label
                        for="search"
                        class="mb-1 block text-xs font-semibold text-gray-600"
                    >
                        Search
                    </label>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search customer or reference #"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >
                </div>

                <div>
                    <label
                        for="from_date"
                        class="mb-1 block text-xs font-semibold text-gray-600"
                    >
                        Starting from
                    </label>

                    <input
                        type="date"
                        id="from_date"
                        name="from_date"
                        value="{{ $fromDate ?? '' }}"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >
                </div>

                <div>
                    <label
                        for="to_date"
                        class="mb-1 block text-xs font-semibold text-gray-600"
                    >
                        Ending on
                    </label>

                    <input
                        type="date"
                        id="to_date"
                        name="to_date"
                        value="{{ $toDate ?? '' }}"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
                    >
                </div>

                <div class="flex items-end gap-2">

                    <button
                        type="submit"
                        class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
                    >
                        Filter
                    </button>

                    @if (!empty($search) || !empty($fromDate) || !empty($toDate))
                        <a
                            href="{{ route('prescriptions.index') }}"
                            class="rounded-xl px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-100"
                        >
                            Clear
                        </a>
                    @endif

                </div>

            </div>
        </form>
    </div>

    <div class="rounded-2xl bg-white shadow-sm ring-1 ring-gray-100">

        @if ($prescriptions->isEmpty())

            <div class="p-8 text-center">

                @if (!empty($search) || !empty($fromDate) || !empty($toDate))

                    <p class="text-gray-500">
                        No prescriptions found matching your search or filters.
                    </p>

                    <a
                        href="{{ route('prescriptions.index') }}"
                        class="mt-4 inline-block text-sm font-semibold text-[#2FA084]"
                    >
                        Clear filters
                    </a>

                @else

                    <p class="text-gray-500">
                        No prescriptions found.
                    </p>

                    <a
                        href="{{ route('prescriptions.create') }}"
                        class="mt-4 inline-block text-sm font-semibold text-[#2FA084]"
                    >
                        Create your first prescription
                    </a>

                @endif

            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50">
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Customer
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Reference #
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Date
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Amount Due
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @foreach ($prescriptions as $prescription)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4 text-sm text-gray-900">
                                    {{ $prescription->customer }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $prescription->reference_number ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $prescription->prescription_date->format('M d, Y') }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $prescription->amount_due !== null
                                        ? number_format((float) $prescription->amount_due, 2)
                                        : 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-sm">

                                    <div class="flex items-center gap-3">

                                        <a
                                            href="{{ route('prescriptions.show', $prescription) }}"
                                            class="font-semibold text-[#2FA084] hover:text-[#1F6F5F]"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route('prescriptions.edit', $prescription) }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900"
                                        >
                                            Edit
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
                                                class="font-semibold text-red-600 hover:text-red-800"
                                            >
                                                Delete
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>

        @endif

    </div>

</div>
@endsection