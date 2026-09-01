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

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</div>
@endsection