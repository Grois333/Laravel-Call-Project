<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Call Report') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <form method="GET" id="filter-form" action="{{ route('calls.filter') }}" class="mb-4">
                    <div class="flex gap-3">
                        <div class="col-md-4">
                            <select name="agent_id" class="form-control">
                                <option value="">Select Agent</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>                            
                            <x-input-error :messages="$errors->get('agent_id')" class="mt-2" />
                        </div>
                        <div class="col-md-4">
                            <x-text-input  type="date" name="start_date" class="form-control" />
                            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                        </div>
                        <div class="col-md-4">
                            <x-text-input  type="date" name="end_date" class="form-control" />
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>
                    </div>
                    <x-primary-button  class=" mt-3 text-center mr-4">Filter</x-primary-button>
                    <x-danger-button type="button" id="reset-button" class=" mt-3 text-center">Reset</x-danger-button>
                </form>
                <div id="loading-indicator" class="hidden fixed inset-0 flex items-center justify-center bg-opacity-50 bg-gray-200 z-50">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-blue-500"></div>
                </div>

                <table class="border w-full text-center">
                    <thead>
                        <tr >
                            <th class='p-2 border'>Customer</th>
                            <th class='p-2 border'>Agent</th>
                            <th class='p-2 border'>Duration</th>
                            <th class='p-2 border'>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calls as $call)
                        <tr>
                            <td class='p-2 border'>{{ $call->customer->name }}</td>
                            <td class='p-2 border'>{{ $call->agent->name }}</td>
                            <td class='p-2 border'>{{ $call->duration }}</td>
                            <td class='p-2 border'>{{ $call->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $calls->links() }}
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("filter-form");
        const loadingIndicator = document.getElementById("loading-indicator");
        const resetButton = document.getElementById("reset-button");
        resetButton.addEventListener("click", function () {
            // Clear all input fields
            form.reset();
        });

        form.addEventListener("submit", function () {
            loadingIndicator.classList.remove("hidden");
        });
    });
</script>