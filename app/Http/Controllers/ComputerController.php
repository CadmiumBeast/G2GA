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
        $computer = $request-> validate([
            'Pc_Name' => 'required',
            'PC_IP' => 'required',
            'Price' => 'required|numeric'
        ]);
        $Newpc = Computer::create($computer);

        return redirect()->route('computers.index');
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
            'Price' => 'required|numeric'
        ]);

        $computer->update($vali);
        return redirect()->route('computers.index');
    }

    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('computers.index');
    }
}
