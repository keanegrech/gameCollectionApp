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

    function show($id) {
        $machine = Machine::find($id);
        return view('machines.show', compact('machine'));
    }
}
