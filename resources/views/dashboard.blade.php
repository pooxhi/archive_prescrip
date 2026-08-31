<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Prescription Archive') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    {{ __('Manage and access archived prescriptions.') }}
                </p>
            </div>
        </div>
    </x-slot>

```
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Statistics --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p class="text-sm font-medium text-gray-500">
                        Total Prescriptions
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        0
                    </p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p class="text-sm font-medium text-gray-500">
                        This Month
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        0
                    </p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p class="text-sm font-medium text-gray-500">
                        Recent Records
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        0
                    </p>
                </div>
            </div>

        </div>

        {{-- Quick Actions --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6">

                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            Quick Actions
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage prescription records.
                        </p>
                    </div>

                    <button
                        type="button"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >
                        Add Prescription
                    </button>
                </div>

            </div>
        </div>

        {{-- Recent Prescriptions --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6">
                <div class="flex items-center justify-between mb-6">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            Recent Prescriptions
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Recently added prescription records.
                        </p>
                    </div>

                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">

                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Patient
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">
                                    No prescription records yet.
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>
</div>
```

</x-app-layout>
