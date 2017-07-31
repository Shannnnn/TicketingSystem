<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SlaPlan;

class SlaPlanController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $sla_plans = SlaPlan::paginate(10);
        return view('tickets.settings.sla_plans.index')->with('sla_plans', $sla_plans);
    }

    public function create() {

        return view('tickets.settings.sla_plans.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'sla_plan'=>'required'
        ]);

        $plan = $request['sla_plan'];
        $sla_plan = new SlaPlan();
        $sla_plan->sla_plan = $plan;
        $sla_plan->save();

        return redirect()->route('plans.index');
    }

    public function show($id) {

        return redirect('plans');
    }

    public function destroy($id) {
        $sla_plan = SlaPlan::findOrFail($id);
        $sla_plan->delete();

        return redirect()->route('plans.index');
    }
}
