<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Priority;

class PriorityController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $priorities = Priority::paginate(10);
        return view('tickets.settings.priorities.index')->with('priorities', $priorities);
    }

    public function create() {

        return view('tickets.settings.priorities.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'priority'=>'required'
        ]);

        $level = $request['priority'];
        $priority = new Priority();
        $priority->priority = $level;
        $priority->save();

        return redirect()->route('priorities.index');
    }

    public function show($id) {

        return redirect('priorities');
    }

    public function destroy($id) {
        $priority = Priority::findOrFail($id);
        $priority->delete();

        return redirect()->route('priorities.index');
    }
}
