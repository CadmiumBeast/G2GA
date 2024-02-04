<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Computer Admin') }}
        </h2>
        <a href="{{ route('computers.create') }}">Add Computer</a>
    </x-slot>
    <div>
        <div>
            @foreach($computers as $computer)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
                    <div class="p-6 text-gray-900">
                        <h2>{{$computer->Pc_Name}}</h2>
                        <p>{{$computer->PC_IP}}</p>
                        <p>{{$computer->Price}}</p>
                    </div>
                    <div>
                        <a href="{{ route('computers.edit', ['computer'=>$computer]) }}">Edit</a>
                        <form method="post" action="{{route('computers.destroy',['computer'=> $computer])}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </div>
                </div>



            @endforeach
            <h2></h2>
        </div>
    </div>
</x-app-layout>
