<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Computer') }}
        </h2>
    </x-slot>
    <div>
        <form method="post" action="{{route('computers.store')}}" class="mx-10 my-5">
            @csrf

            <div>
                <label for="name">Name</label>
                <input id="Pc_Name" class="block mt-1 w-full" type="text" name="Pc_Name" :value="old('name')" required autofocus />
            </div>
            <div class="mt-4">
                <label for="ip">IP Address</label>
                <input id="Pc_IP" class="block mt-1 w-full" type="text" name="PC_IP" :value="old('ip')" required />
            </div>
            <div>
                <label for="price">Price </label>
                <input id="Price" class="block mt-1 w-full" type="text" name="Price" :value="old('price')" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <input type="submit" value="Add Computer">
            </div>
        </form>
    </div>
</x-app-layout>
