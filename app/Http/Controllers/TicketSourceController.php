<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\TicketSource;
use App\HelpTopic;
use App\Department;

class TicketSourceController extends Controller
{
    public function __construct() {

        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {

        $ticket_sources = TicketSource::paginate(10);
        return view('tickets.settings.ticket_sources.index')->with('ticket_sources', $ticket_sources);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {

        return view('tickets.settings.ticket_sources.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $this->validate($request, [
            'source'=>'required'
        ]);

        $source = $request['source'];
        $ticket_source = new TicketSource();
        $ticket_source->source = $source;
        $ticket_source->save();

        return redirect()->route('sources.index');
    }

    public function show($id) {

        return redirect('sources');
    }

    public function destroy($id) {

        $ticket_source = TicketSource::findOrFail($id);
        $ticket_source->delete();

        return redirect()->route('sources.index');
    }
}
