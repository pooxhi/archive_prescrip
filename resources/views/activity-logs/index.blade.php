@extends('layouts.app')

@section('title', 'Activity Logs | OptiArchive')

@section('content')
<div class="mx-auto max-w-7xl space-y-6">

    <div>
        <p class="text-sm font-semibold text-[#2FA084]">
            Administration
        </p>

        <h1 class="mt-1 text-2xl font-bold text-slate-900">
            Activity Logs
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Review recent actions performed in the system.
        </p>
    </div>

    <x-card padding="p-0" class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left">
                <thead>
                    <tr class="border-b border-slate-100 bg-[#EEEEEE]/50">
                        <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                            Action
                        </th>

                        <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                            User
                        </th>

                        <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                            Record
                        </th>

                        <th class="px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-slate-500">
                            Date & Time
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($activities as $activity)
                        <tr class="hover:bg-[#EEEEEE]/45">
                            <td class="px-5 py-4">
                                <span class="text-sm font-semibold capitalize text-slate-800">
                                    {{ str_replace('_', ' ', $activity->action) }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-600">
                                {{ $activity->user?->name ?? 'System' }}
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-600">
                                @if ($activity->subject instanceof \App\Models\Prescription)
                                    Prescription:
                                    {{ $activity->subject->customer }}

                                    @if ($activity->subject->reference_number)
                                        ({{ $activity->subject->reference_number }})
                                    @endif
                                @elseif ($activity->subject_type)
                                    {{ class_basename($activity->subject_type) }}
                                @else
                                    —
                                @endif
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-600">
                                {{ $activity->created_at?->format('M j, Y g:i A') ?? '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-10 text-center">
                                <p class="text-sm font-medium text-slate-600">
                                    No activity has been recorded yet.
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Activity will appear here as actions are performed.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($activities->hasPages())
            <div class="border-t border-slate-100 px-5 py-4">
                {{ $activities->links() }}
            </div>
        @endif
    </x-card>

</div>
@endsection