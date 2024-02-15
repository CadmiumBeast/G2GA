<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerRequest;
use App\Http\Resources\ComputerResource;
use App\Models\Computer;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index()
    {
        $computers = Computer::all();
        return view('Computer.compadmin', ['computers' => $computers] );
    }

    public function create()
    {
        return view('Computer.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'Pc_Name' => 'required',
            'PC_IP' => 'required',
            'Price' => 'required|numeric',
            'path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imagepath = time() . '.' . $request->path->extension();
//        dd($request->all());
        $request->path->storeAs('public/path_images', $imagepath);

        Computer::create([
            'Pc_Name' => $request->Pc_Name,
            'PC_IP' => $request->PC_IP,
            'Price' => $request->Price,
            'path' => $imagepath
        ]);



       /* if ($request->hasFile('path')) {
            foreach ($request->file('path') as $key => $image) {
                $imageName = 'path_' . ($key + 1) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('path_images'), $imageName);
                $computer->setAttribute('path_' . ($key + 1), 'path_images/' . $imageName);
            }
            $computer->save();
        }*/
        return redirect()->route('admin.computers.index');
    }


    public function edit(Computer $computer)
    {
        return view('Computer.edit', ['computer' => $computer]);
    }

    public function show(Computer $computer)
    {
        return new ComputerResource($computer);
    }

    public function update(Request $request, Computer $computer)
    {
        $vali = $request-> validate([
            'Pc_Name' => 'required',
            'PC_IP' => 'required',
            'Price' => 'required|numeric',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $computer->update($vali);
        return redirect()->route('computers.index');
    }

    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('admin.computers.index');
    }
}
