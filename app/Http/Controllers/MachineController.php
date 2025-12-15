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
        return view('machines.create');
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
}
