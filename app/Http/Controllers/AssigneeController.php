<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignee;
use Session;

class AssigneeController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $assignees = Assignee::paginate(10);
        return view('tickets.settings.assignees.index')->with('assignees', $assignees);
    }

    public function create() {

        return view('tickets.settings.assignees.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'assignee'=>'required'
        ]);

        $assigned = $request['assignee'];
        $assignee = new Assignee();
        $assignee->assignee = $assigned;
        $assignee->save();

        return redirect()->route('assignees.index');
    }

    public function show($id) {

        return redirect('assignees');
    }

    public function destroy($id) {
        $assignee = Assignee::findOrFail($id);
        $assignee->delete();

        return redirect()->route('assignees.index');
    }
}
