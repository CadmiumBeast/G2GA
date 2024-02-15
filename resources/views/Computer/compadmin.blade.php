<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Computer Admin') }}
        </h2>
    </x-slot>
    <div>
        <a style="padding: 10px; background: black; color: white; border-radius: 10px; margin-left: 40px;" href="{{ route('admin.computers.create') }}">Add Computer</a>
        <div>

            @foreach($computers as $computer)
                <div class="bg-amber-200 overflow-hidden shadow-sm sm:rounded-lg flex justify-between px-10 m-10 h-25">
                    <div class="p-6 text-gray-900 flex align-baseline ">
                        <div>
                            <img style="width: 100px; height: 100px; margin-top: 30px" src="{{ asset('storage/path_images/'.$computer->path) }}">
                        </div>
                        <div style="padding-left: 25px">
                            <h2 class="font-300 text-3xl py-3 ">{{$computer->Pc_Name}}</h2>
                            <p class="font-300 text-2xl py-3">{{$computer->PC_IP}}</p>
                            <p class="font-300 text-2xl
                         py-3">{{$computer->Price}}</p>
                        </div>

                    </div>

                    <div class="py-10">
                        <a class="bg-amber-950 w-15 h-15 text-amber-50 m-10 p-3 rounded-lg" href="{{ route('admin.computers.edit', ['computer'=>$computer]) }}">Edit</a>
                        <form method="post" action="{{route('admin.computers.destroy',['computer'=> $computer])}}">
                            @csrf
                            @method('DELETE')
                            <input class="bg-amber-950 w-15 h-15 text-amber-50 m-10 p-3 rounded-lg" type="submit" value="Delete">
                        </form>
                    </div>
                </div>



            @endforeach
            <h2></h2>
        </div>
    </div>
</x-app-layout>
