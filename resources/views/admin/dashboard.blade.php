<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1>Admin</h1>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.computers.create') }}">Add Computer</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.computers.index') }}">View Computer</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
