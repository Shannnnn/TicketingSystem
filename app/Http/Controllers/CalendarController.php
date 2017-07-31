<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class CalendarController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']);
    }

    public function index() {

        $tickets = Ticket::all();
        return view('screens.calendar')->with('tickets', $tickets);
    }
}
