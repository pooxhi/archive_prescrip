@extends('layouts.app')

@section('title', 'Deleted Prescriptions | OptiArchive')

@section('content')

<div class="mx-auto max-w-7xl space-y-6">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-semibold text-[#2FA084]">
                Prescription Archive
            </p>

            <h1 class="mt-1 text-2xl font-bold text-gray-900">
                Deleted Prescriptions
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Records currently within the clinic's retention period.
            </p>
        </div>

        <a
            href="{{ route('prescriptions.index') }}"
            class="rounded-xl px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-100"
        >
            &larr; Back to Prescriptions
        </a>
    </div>

    <div class="rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4">
        <p class="text-sm font-semibold text-amber-900">
            Retention period: {{ $retentionYears }} years
        </p>

        <p class="mt-1 text-sm text-amber-800">
            Deleted prescriptions remain retained until their scheduled permanent deletion date.
        </p>
    </div>

    <form method="GET" action="{{ route('prescriptions.deleted') }}">
        <div class="flex flex-col gap-3 sm:flex-row">
            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search customer or reference #"
                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#2FA084] focus:ring-[#2FA084]"
            >

            <button
                type="submit"
                class="rounded-xl bg-[#2FA084] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
            >
                Search
            </button>

            @if (!empty($search))
                <a
                    href="{{ route('prescriptions.deleted') }}"
                    class="rounded-xl px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-100"
                >
                    Clear
                </a>
            @endif
        </div>
    </form>

    <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-100">

        @if ($prescriptions->isEmpty())

            <div class="p-10 text-center">
                <p class="text-sm font-medium text-gray-600">
                    No deleted prescriptions found.
                </p>

                <p class="mt-1 text-xs text-gray-400">
                    Deleted records will appear here during their retention period.
                </p>
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
                                Prescription Date
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Deleted On
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Permanent Deletion
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @foreach ($prescriptions as $prescription)

                            @php
                                $purgeDate = $prescription->deleted_at
                                    ->copy()
                                    ->addYears($retentionYears);
                            @endphp

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $prescription->customer }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $prescription->reference_number ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $prescription->prescription_date->format('M d, Y') }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $prescription->deleted_at->format('M d, Y') }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    <span class="font-semibold text-amber-700">
                                        {{ $purgeDate->format('M d, Y') }}
                                    </span>

                                    <p class="mt-1 text-xs text-gray-400">
                                        {{ $purgeDate->diffForHumans() }}
                                    </p>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>

            @if ($prescriptions->hasPages())
                <div class="border-t border-gray-100 px-6 py-4">
                    {{ $prescriptions->links() }}
                </div>
            @endif

        @endif

    </div>

</div>

@endsection