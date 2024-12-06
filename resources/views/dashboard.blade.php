<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="specs-container" hx-get="/specs" hx-trigger="load" hx-swap="outerHTML">
                    <!-- This content will be replaced by the response from /specs -->
                    <p>Loading specs...</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
