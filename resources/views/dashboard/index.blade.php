@extends('layouts.app')

@section('title', 'Dashboard | OptiArchive')

@section('content')
<div class="mx-auto max-w-7xl space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-semibold text-[#2FA084]">{{ now()->format('l, F j, Y') }}</p>
            <h1 class="font-heading mt-2 text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl">
                Good morning, Dr. Santos
            </h1>
            <p class="mt-2 text-sm text-slate-500">
                Here's an overview of your optical clinic today.
            </p>
        </div>

        <a
            href="{{ route('prescriptions.create') }}"
            class="inline-flex items-center gap-2 rounded-xl bg-[#2FA084] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1F6F5F]"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14"/>
            </svg>

            New Prescription
        </a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach([
                    [
                        'label' => 'Total Prescriptions',
                        'value' => $totalPrescriptions,
                        'meta' => 'All prescription records',
                    ],
                    [
                        'label' => "Today's Prescriptions",
                        'value' => $todayPrescriptions,
                        'meta' => 'Created today',
                    ],
                    [
                        'label' => 'This Month',
                        'value' => $monthPrescriptions,
                        'meta' => now()->format('F Y'),
                    ],
                    [
                        'label' => 'Total Amount Due',
                        'value' => '₱' . number_format($totalAmountDue, 2),
                        'meta' => 'Across all prescriptions',
                    ],
            ] as $stat)
            <x-card class="flex flex-col justify-between">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-slate-500">{{ $stat['label'] }}</p>
                        <p class="font-heading mt-3 text-2xl font-semibold tracking-tight text-slate-900">
                            {{ $stat['value'] }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EEEEEE] text-[#1F6F5F]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v18M3 12h18"/>
                        </svg>
                    </div>
                </div>

                <p class="mt-4 text-xs font-medium text-[#2FA084]">
                    {{ $stat['meta'] }}
                </p>
            </x-card>
        @endforeach
    </div>

    <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_340px]">
        <x-card padding="p-0" class="overflow-hidden">
            <div class="flex flex-col gap-3 border-b border-slate-100 p-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="font-heading text-sm font-semibold text-slate-900">Recent Patients</h2>
                    <p class="mt-1 text-sm text-slate-500">Recently updated patient records.</p>
                </div>

                <a href="#" class="text-sm font-semibold text-[#2FA084] hover:text-[#1F6F5F]">
                    View all
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px] text-left">
                    <thead>
                        <tr class="border-b border-slate-100 bg-[#EEEEEE]/50">
                            <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">Patient</th>
                            <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">Last Visit</th>
                            <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">Records</th>
                            <th class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @foreach([
                            ['name' => 'Juan Dela Cruz', 'initials' => 'JC', 'visit' => 'Aug 18, 2026', 'records' => 4],
                            ['name' => 'Maria Santos', 'initials' => 'MS', 'visit' => 'Aug 17, 2026', 'records' => 2],
                            ['name' => 'Angela Reyes', 'initials' => 'AR', 'visit' => 'Aug 16, 2026', 'records' => 5],
                            ['name' => 'Carlos Mendoza', 'initials' => 'CM', 'visit' => 'Aug 15, 2026', 'records' => 3],
                        ] as $patient)
                            <tr class="hover:bg-[#EEEEEE]/45">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#6FCF97]/20 text-xs font-bold text-[#1F6F5F]">
                                            {{ $patient['initials'] }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-slate-800">{{ $patient['name'] }}</p>
                                            <p class="text-xs text-slate-400">Patient</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-600">{{ $patient['visit'] }}</td>
                                <td class="px-5 py-4">
                                    <span class="rounded-full bg-[#EEEEEE] px-2.5 py-1 text-xs font-semibold text-[#1F6F5F]">
                                        {{ $patient['records'] }} records
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <a href="#" class="text-sm font-semibold text-[#2FA084] hover:text-[#1F6F5F]">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>

        <x-card>
            <div>
                <h2 class="font-heading text-sm font-semibold text-slate-900">Quick Actions</h2>
                <p class="mt-1 text-sm text-slate-500">Common clinic tasks.</p>
            </div>

            <div class="mt-5 space-y-3">
                <a
                    href="{{ route('prescriptions.create') }}"
                    class="flex items-center gap-4 rounded-xl border border-slate-200 p-4 transition hover:border-[#2FA084]/30 hover:bg-[#EEEEEE]/45"
                >
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#2FA084] text-white">+</div>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">New Prescription</p>
                        <p class="text-xs text-slate-400">Create a patient record</p>
                    </div>
                </a>

                <a href="#" class="flex items-center gap-4 rounded-xl border border-slate-200 p-4 transition hover:border-[#2FA084]/30 hover:bg-[#EEEEEE]/45">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#6FCF97] text-[#1F6F5F]">⌁</div>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">Scan Prescription</p>
                        <p class="text-xs text-slate-400">Use OCR assistance</p>
                    </div>
                </a>

                <a href="#" class="flex items-center gap-4 rounded-xl border border-slate-200 p-4 transition hover:border-[#2FA084]/30 hover:bg-[#EEEEEE]/45">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EEEEEE] text-[#1F6F5F]">↗</div>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">View Activity</p>
                        <p class="text-xs text-slate-400">Review recent actions</p>
                    </div>
                </a>
            </div>
        </x-card>
    </div>

    <x-card padding="p-0" class="overflow-hidden">
        <div class="border-b border-slate-100 p-5">
            <h2 class="font-heading text-sm font-semibold text-slate-900">Recent Activity</h2>
            <p class="mt-1 text-sm text-slate-500">Latest actions performed in the system.</p>
        </div>

        <div class="divide-y divide-slate-100">
            @foreach([
                ['text' => 'Dr. Santos created a prescription for Juan Dela Cruz.', 'time' => '12 minutes ago'],
                ['text' => 'OCR successfully processed a prescription scan.', 'time' => '28 minutes ago'],
                ['text' => 'Maria Santos patient record was updated.', 'time' => '1 hour ago'],
                ['text' => 'New staff account created.', 'time' => '2 hours ago'],
            ] as $activity)
                <div class="flex items-start gap-4 px-5 py-4">
                    <span class="mt-1.5 h-2.5 w-2.5 shrink-0 rounded-full bg-[#2FA084]"></span>
                    <div>
                        <p class="text-sm text-slate-700">{{ $activity['text'] }}</p>
                        <p class="mt-1 text-xs text-slate-400">{{ $activity['time'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</div>
@endsection
