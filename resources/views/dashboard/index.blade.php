@extends('layouts.app')

@section('title', 'Dashboard | OptiArchive')

@section('content')
<div class="mx-auto max-w-7xl space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-semibold text-[#2FA084]">{{ now()->format('l, F j, Y') }}</p>
            @php
                $hour = now()->hour;

                $greeting = match (true) {
                    $hour < 12 => 'Good morning',
                    $hour < 18 => 'Good afternoon',
                    default => 'Good evening',
                };
            @endphp

            <h1 class="font-heading mt-2 text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl">
                {{ $greeting }}, {{ Auth::user()->name }}
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
                'icon' => 'document',
            ],
            [
                'label' => "Today's Prescriptions",
                'value' => $todayPrescriptions,
                'meta' => 'Created today',
                'icon' => 'calendar',
            ],
            [
                'label' => 'This Month',
                'value' => $monthPrescriptions,
                'meta' => now()->format('F Y'),
                'icon' => 'chart',
            ],
            [
                'label' => 'Total Amount Due',
                'value' => '₱' . number_format($totalAmountDue, 2),
                'meta' => 'Across all prescriptions',
                'icon' => 'money',
            ],
        ] as $stat)
            <x-card class="flex flex-col justify-between">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            {{ $stat['label'] }}
                        </p>

                        <p class="font-heading mt-3 text-2xl font-semibold tracking-tight text-slate-900">
                            {{ $stat['value'] }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EEEEEE] text-[#1F6F5F]">
                        @if ($stat['icon'] === 'document')
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M7 3h7l4 4v14H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14 3v5h5M9 13h6M9 17h4"
                                />
                            </svg>

                        @elseif ($stat['icon'] === 'calendar')
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect
                                    x="3"
                                    y="4"
                                    width="18"
                                    height="17"
                                    rx="2"
                                />
                                <path
                                    stroke-linecap="round"
                                    d="M16 2v4M8 2v4M3 10h18"
                                />
                            </svg>

                        @elseif ($stat['icon'] === 'chart')
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 19V5M4 19h16"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m7 15 4-4 3 2 5-6"
                                />
                            </svg>

                        @elseif ($stat['icon'] === 'money')
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect
                                    x="3"
                                    y="5"
                                    width="18"
                                    height="14"
                                    rx="2"
                                />
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3"
                                />
                                <path
                                    stroke-linecap="round"
                                    d="M7 9h.01M17 15h.01"
                                />
                            </svg>
                        @endif
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
                    <h2 class="font-heading text-sm font-semibold text-slate-900">Recent Prescriptions</h2>
                    <p class="mt-1 text-sm text-slate-500">Latest prescription records added to the archive.</p>
                </div>

                <a
                    href="{{ route('prescriptions.index') }}"
                    class="text-sm font-semibold text-[#2FA084] hover:text-[#1F6F5F]"
                >
                    View all
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left">
                    <thead>
                        <tr class="border-b border-slate-100 bg-[#EEEEEE]/50">
                            <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                                Customer
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                                Reference #
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                                Date
                            </th>
                            <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                                Amount Due
                            </th>
                            <th class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentPrescriptions as $prescription)
                            <tr class="hover:bg-[#EEEEEE]/45">
                                <td class="px-5 py-4">
                                    <p class="text-sm font-semibold text-slate-800">
                                        {{ $prescription->customer }}
                                    </p>
                                </td>

                                <td class="px-5 py-4 text-sm text-slate-600">
                                    {{ $prescription->reference_number ?: '—' }}
                                </td>

                                <td class="px-5 py-4 text-sm text-slate-600">
                                    {{ optional($prescription->prescription_date)->format('M j, Y') ?? '—' }}
                                </td>

                                <td class="px-5 py-4 text-sm font-medium text-slate-700">
                                    @if ($prescription->amount_due !== null)
                                        ₱{{ number_format($prescription->amount_due, 2) }}
                                    @else
                                        —
                                    @endif
                                </td>

                                <td class="px-5 py-4 text-right">
                                    <a
                                        href="{{ route('prescriptions.show', $prescription) }}"
                                        class="text-sm font-semibold text-[#2FA084] hover:text-[#1F6F5F]"
                                    >
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-10 text-center">
                                    <p class="text-sm font-medium text-slate-600">
                                        No prescriptions have been recorded yet.
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        Create a prescription to see it appear here.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
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
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#2FA084] text-white">
                        +
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-slate-800">New Prescription</p>
                        <p class="text-xs text-slate-400">Create a new prescription record</p>
                    </div>
                </a>

                <a
                    href="{{ route('prescriptions.index') }}"
                    class="flex items-center gap-4 rounded-xl border border-slate-200 p-4 transition hover:border-[#2FA084]/30 hover:bg-[#EEEEEE]/45"
                >
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#6FCF97] text-[#1F6F5F]">
                        ≡
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-slate-800">View Prescriptions</p>
                        <p class="text-xs text-slate-400">Browse and search the archive</p>
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
            @forelse($recentActivities as $activity)
                <div class="flex items-start gap-4 px-5 py-4">
                    <span class="mt-1.5 h-2.5 w-2.5 shrink-0 rounded-full bg-[#2FA084]"></span>

                    <div>
                        <p class="text-sm text-slate-700">
                            @if ($activity->user)
                                {{ $activity->user->name }}
                            @else
                                System
                            @endif

                            {{ str_replace('_', ' ', $activity->action) }}

                            @if ($activity->subject)
                                @if ($activity->subject instanceof \App\Models\Prescription)
                                    prescription for {{ $activity->subject->customer }}
                                @else
                                    {{ class_basename($activity->subject_type) }}
                                @endif
                            @endif
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            {{ $activity->created_at?->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="px-5 py-8 text-center">
                    <p class="text-sm font-medium text-slate-600">
                        No recent activity.
                    </p>
                    <p class="mt-1 text-xs text-slate-400">
                        Activity will appear here as actions are performed.
                    </p>
                </div>
            @endforelse
        </div>
    </x-card>
</div>
@endsection
