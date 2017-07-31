<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description;

class DescriptionController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $descriptions = Description::paginate(10);
        return view('tickets.settings.descriptions.index')->with('descriptions', $descriptions);
    }

    public function create() {

        return view('tickets.settings.descriptions.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'description'=>'required'
        ]);

        $dept = $request['description'];
        $description = new Description();
        $description->description = $dept;
        $description->save();

        return redirect()->route('descriptions.index');
    }

    public function show($id) {

        return redirect('descriptions');
    }

    public function destroy($id) {
        $description = Description::findOrFail($id);
        $description->delete();

        return redirect()->route('descriptions.index');
    }
}
