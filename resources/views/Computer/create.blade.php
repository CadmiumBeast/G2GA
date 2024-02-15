<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Computer') }}
        </h2>
    </x-slot>
    <div>
        <form method="post" action="{{ route('admin.computers.store') }}" class="mx-10 my-5" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="Pc_Name">Name</label>
                <input id="Pc_Name" class="block mt-1 w-full" type="text" name="Pc_Name" :value="old('Pc_Name')" required autofocus />
            </div>
            <div class="mt-4">
                <label for="PC_IP">IP Address</label>
                <input id="PC_IP" class="block mt-1 w-full" type="text" name="PC_IP" :value="old('PC_IP')" required />
            </div>
            <div>
                <label for="Price">Price</label>
                <input id="Price" class="block mt-1 w-full" type="text" name="Price" :value="old('Price')" required />
            </div>
            <div>
                <label for="path">Image</label>
                <input id="path" class="block mt-1 w-full" type="file" name="path" :value="old('path')"/>
            </div>
            <div class="flex items-center justify-end mt-4">
                <input type="submit" value="Add Computer">
            </div>
        </form>
    </div>
</x-app-layout>
