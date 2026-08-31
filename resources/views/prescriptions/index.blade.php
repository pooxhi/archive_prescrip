@extends('layouts.app')

@section('title', 'Prescriptions | OptiArchive')

@section('content')
<div class="mx-auto max-w-7xl space-y-6">

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
            class="rounded-lg bg-[#2FA084] px-4 py-2 text-sm font-semibold text-white"
        >
            New Prescription
        </a>
    </div>

    <div class="rounded-xl bg-white shadow">

        @if ($prescriptions->isEmpty())

            <div class="p-8 text-center">
                <p class="text-gray-500">
                    No prescriptions found.
                </p>

                <a
                    href="{{ route('prescriptions.create') }}"
                    class="mt-4 inline-block text-sm font-semibold text-[#2FA084]"
                >
                    Create your first prescription
                </a>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="px-6 py-4 text-sm font-semibold">
                                Customer
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold">
                                Reference #
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold">
                                Date
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold">
                                Amount Due
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">

                        @foreach ($prescriptions as $prescription)

                            <tr>

                                <td class="px-6 py-4 text-sm">
                                    {{ $prescription->customer }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    {{ $prescription->reference_number ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    {{ $prescription->prescription_date->format('M d, Y') }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    {{ $prescription->amount_due !== null
                                        ? number_format((float) $prescription->amount_due, 2)
                                        : 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-sm">

                                    <a
                                        href="{{ route('prescriptions.show', $prescription) }}"
                                        class="font-semibold text-[#2FA084]"
                                    >
                                        View
                                    </a>

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