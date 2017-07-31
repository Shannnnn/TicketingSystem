<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $departments = Department::paginate(10);
        return view('tickets.settings.departments.index')->with('departments', $departments);
    }

    public function create() {

        return view('tickets.settings.departments.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'department'=>'required'
        ]);

        $dept = $request['department'];
        $department = new Department();
        $department->department = $dept;
        $department->save();

        return redirect()->route('departments.index');
    }

    public function show($id) {

        return redirect('departments');
    }

    public function destroy($id) {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index');
    }
}
