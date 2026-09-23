@extends('layouts.app')

@section('title', 'Profile | OptiArchive')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    
    <div>
        <p class="text-sm font-semibold text-[#2FA084]">
            Account Settings
        </p>

        <h1 class="mt-1 text-2xl font-bold text-gray-900">
            Profile
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Manage your account's profile information, password, and data.
        </p>
    </div>

    {{-- Account Information --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                Account Information
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                View your account status and access information.
            </p>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-3">

            <div>
                <p class="text-sm font-medium text-gray-500">
                    Role
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-900">
                    {{ ucfirst($user->role) }}
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">
                    Account Status
                </p>

                <div class="mt-1 flex items-center gap-2">
                    <span
                        class="h-2 w-2 rounded-full {{ $user->is_active ? 'bg-green-500' : 'bg-red-500' }}"
                    ></span>

                    <p class="text-sm font-semibold {{ $user->is_active ? 'text-green-700' : 'text-red-700' }}">
                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                    </p>
                </div>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">
                    Member Since
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-900">
                    {{ $user->created_at->format('F j, Y') }}
                </p>
            </div>

        </div>
    </div>

    {{-- Profile Information --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- Password --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- Delete Account --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</div>
@endsection