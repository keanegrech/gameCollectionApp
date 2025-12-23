<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;

class MachineController extends Controller
{
    function index() {
        $machines = Machine::all();
        return view('machines.index', compact('machines'));
    }

    function create() {
        $machine = new Machine();
        return view('machines.create', compact('machine'));
    }

    function show($id) {
        $machine = Machine::find($id);
        return view('machines.show', compact('machine'));
    }

    function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
        ]);

        Machine::create($request->all());
        return redirect()->route('machines.index')->with('success', 'Machine created successfully.');
    }

    function edit($id) {
        $machine = Machine::find($id);
        return view('machines.edit', compact('machine'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
        ]);

        $machine = Machine::find($id);
        $machine->update($request->all());
        return redirect()->route('machines.index')->with('success', 'Machine updated successfully.');
    }

    function destroy($id) {
        $machine = Machine::find($id);
        $machine->delete();
        return redirect()->route('machines.index')->with('success', 'Machine deleted successfully.');
    }
}
