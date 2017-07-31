<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;
use App\Client;
use App\HelpTopic;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']);
    }

    public function index() {
        $tickets_count = Ticket::count();
        $open_tickets_count = Ticket::where('ticket_status','Open')->count();
        $closed_tickets_count = $tickets_count - $open_tickets_count;

        $topics = HelpTopic::all();
        $tickets = Ticket::all();
        $clients = Client::all();

        $agents = User::role('agent')->get();

        return view('screens.dashboard', compact('open_tickets_count', 'closed_tickets_count', 'tickets_count',
                     'topics', 'agents', 'tickets', 'clients'));
    }
}