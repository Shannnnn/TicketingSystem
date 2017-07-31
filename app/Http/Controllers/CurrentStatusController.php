<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurrentStatus;

class CurrentStatusController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $statuses = CurrentStatus::paginate(10);
        return view('tickets.settings.statuses.index')->with('statuses', $statuses);
    }

    public function create() {

        return view('tickets.settings.statuses.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'status'=>'required'
        ]);

        $current = $request['status'];
        $statuses = new CurrentStatus();
        $statuses->status = $current;
        $statuses->save();

        return redirect()->route('statuses.index');
    }

    public function show($id) {

        return redirect('statuses');
    }

    public function destroy($id) {
        $statuses = CurrentStatus::findOrFail($id);
        $statuses->delete();

        return redirect()->route('statuses.index');
    }
}
