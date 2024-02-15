<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a Computer') }}
        </h2>
    </x-slot>
    <div>
        <form method="post" action="{{route('admin.computers.update', ['computer'=>$computer])}}" class="mx-10 my-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input id="Pc_Name" class="block mt-1 w-full" type="text" name="Pc_Name" value="{{$computer ->Pc_Name}}"  autofocus />
            </div>
            <div class="mt-4">
                <label for="ip">IP Address</label>
                <input id="Pc_IP" class="block mt-1 w-full" type="text" name="PC_IP" value="{{$computer ->PC_IP}}"  />
            </div>
            <div>
                <label for="price">Price </label>
                <input id="Price" class="block mt-1 w-full" type="text" name="Price" value="{{$computer ->Price}}"  />
            </div>
            <div class="flex items-center justify-end mt-4">
                <input type="submit" value="Edit Computer">
            </div>
        </form>
    </div>
</x-app-layout>
