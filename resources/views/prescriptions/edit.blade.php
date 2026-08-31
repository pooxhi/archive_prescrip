@extends('layouts.app')

@section('title', 'Edit Prescription | OptiArchive')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            Edit Prescription
        </h1>

        <p class="text-sm text-gray-500">
            Update the prescription details.
        </p>
    </div>

    <form method="POST"
          action="{{ route('prescriptions.update', $prescription) }}"
          class="space-y-6">

        @csrf
        @method('PUT')

        <div class="rounded-xl bg-white p-6 shadow">

            <h2 class="text-lg font-semibold">
                General Information
            </h2>

            <div class="mt-4 space-y-4">

                <div>
                    <label for="customer">Customer</label>

                    <input
                        type="text"
                        id="customer"
                        name="customer"
                        value="{{ old('customer', $prescription->customer) }}"
                        class="mt-1 block w-full rounded border-gray-300"
                    >
                </div>

                <div>
                    <label for="address">Address</label>

                    <input
                        type="text"
                        id="address"
                        name="address"
                        value="{{ old('address', $prescription->address) }}"
                        class="mt-1 block w-full rounded border-gray-300"
                    >
                </div>

                <div>
                    <label for="date">Date</label>

                    <input
                        type="date"
                        id="date"
                        name="date"
                        value="{{ old('date', $prescription->prescription_date->format('Y-m-d')) }}"
                        class="mt-1 block w-full rounded border-gray-300"
                    >
                </div>

                <div>
                    <label for="reference_number">Reference #</label>

                    <input
                        type="text"
                        id="reference_number"
                        name="reference_number"
                        value="{{ old('reference_number', $prescription->reference_number) }}"
                        class="mt-1 block w-full rounded border-gray-300"
                    >
                </div>

            </div>
        </div>

        <div class="rounded-xl bg-white p-6 shadow">

            <h2 class="text-lg font-semibold">
                Prescription Details
            </h2>

            <div class="mt-6">
                <h3 class="font-medium">Right Eye</h3>

                <div class="mt-3 grid gap-4 sm:grid-cols-4">

                    <input
                        type="text"
                        name="right_sph"
                        placeholder="SPH"
                        value="{{ old('right_sph', $prescription->right_sphere) }}"
                        class="rounded border-gray-300"
                    >

                    <input
                        type="text"
                        name="right_cyl"
                        placeholder="CYL"
                        value="{{ old('right_cyl', $prescription->right_cylinder) }}"
                        class="rounded border-gray-300"
                    >

                    <input
                        type="text"
                        name="right_axis"
                        placeholder="Axis"
                        value="{{ old('right_axis', $prescription->right_axis) }}"
                        class="rounded border-gray-300"
                    >

                    <input
                        type="text"
                        name="right_add"
                        placeholder="ADD"
                        value="{{ old('right_add', $prescription->right_add) }}"
                        class="rounded border-gray-300"
                    >

                </div>
            </div>

            <div class="mt-8">
                <h3 class="font-medium">Left Eye</h3>

                <div class="mt-3 grid gap-4 sm:grid-cols-4">

                    <input
                        type="text"
                        name="left_sph"
                        placeholder="SPH"
                        value="{{ old('left_sph', $prescription->left_sphere) }}"
                        class="rounded border-gray-300"
                    >

                    <input
                        type="text"
                        name="left_cyl"
                        placeholder="CYL"
                        value="{{ old('left_cyl', $prescription->left_cylinder) }}"
                        class="rounded border-gray-300"
                    >

                    <input
                        type="text"
                        name="left_axis"
                        placeholder="Axis"
                        value="{{ old('left_axis', $prescription->left_axis) }}"
                        class="rounded border-gray-300"
                    >

                    <input
                        type="text"
                        name="left_add"
                        placeholder="ADD"
                        value="{{ old('left_add', $prescription->left_add) }}"
                        class="rounded border-gray-300"
                    >

                </div>
            </div>

            <div class="mt-8">
                <label for="pd">PD</label>

                <input
                    type="text"
                    id="pd"
                    name="pd"
                    value="{{ old('pd', $prescription->pd) }}"
                    class="mt-1 block w-full rounded border-gray-300"
                >
            </div>

            <div class="mt-8">
                <label for="notes">Notes</label>

                <textarea
                    id="notes"
                    name="notes"
                    rows="4"
                    class="mt-1 block w-full rounded border-gray-300"
                >{{ old('notes', $prescription->notes) }}</textarea>
            </div>

            <div class="mt-8">
                <label for="amount_due">Amount Due</label>

                <input
                    type="number"
                    id="amount_due"
                    name="amount_due"
                    min="0"
                    step="0.01"
                    value="{{ old('amount_due', $prescription->amount_due) }}"
                    class="mt-1 block w-full rounded border-gray-300"
                >
            </div>

        </div>

        <div class="flex gap-3">
            <a
                href="{{ route('prescriptions.show', $prescription) }}"
                class="rounded bg-gray-200 px-4 py-2"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded bg-[#2FA084] px-4 py-2 text-white"
            >
                Update Prescription
            </button>
        </div>

    </form>

</div>
@endsection