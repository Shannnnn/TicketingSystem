<?php

namespace App\Http\Controllers;

use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Company;
use App\Branch;
use App\Contact;
use App\TicketSource;
use App\SlaPlan;
use App\HelpTopic;
use App\Department;
use App\Assignee;
use App\CurrentStatus;
use App\Priority;
use App\Product;
use App\Ticket;
use App\Description;
use App\Brand;
use App\User;
use App\Comment;
use App\Tag;
use DB;

class TicketController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']);
    }

    public function index() {
        return view('tickets.index');
    }

    public function open() {
        return view('tickets.open');
    }

    public function closed() {
        return view('tickets.closed');
    }

    public function owned() {
        return view('tickets.owned');
    }

    public function getAllTags($id) {

        $data = Tag::where('ticket_id', $id)->get();
        return $data;
    }

    public function getAllCompanies(Request $request) {

        $data = Company::select('id', 'company', 'sortcompany')->orderBy('company', 'asc')->get();
        return $data;
    }

    public function getAddress($company, $id){

        $data = Branch::select('branch_address') -> where('company_id', $company) -> where('id', $id) -> get();
        return $data;
    }

    public function getBranches($id) {
        $data = Branch::select('branch', 'id') -> where('company_id', $id) -> get();
        return $data;
    }

    public function getClientId($company, $id) {
        $company_name = Company::select('company') -> where('id', $company) -> first();
        $branch = Branch::select('branch') -> where('company_id', $company) -> where('id', $id) -> first();
        $data = Client::select('id') -> where('company_name', $company_name->company) -> where('branch', $branch->branch) -> first();
        return $data;
    }

    public function getContacts($company, $id){

        $company_name = Company::select('company') -> where('id', $company) -> first();
        $branch = Branch::select('branch') -> where('company_id', $company) -> where('id', $id) -> first();
        $client_id = Client::select('id') -> where('company_name', $company_name->company) -> where('branch', $branch->branch) -> first();
        $data = Contact::select('contact_name', 'contact_number', 'email', 'label') -> where('client_id', $client_id->id) -> get();
        return $data;
    }

    public function getTicket($id){

       $ticket = Ticket::where('id', $id)->first();
       return $ticket;
    }

    public function getAllTickets(Request $request) {

        $data = DB::table('tickets')->select('tickets.id', 'tickets.help_topic', 'tickets.product', 'tickets.description', 'tickets.created_at', 'tickets.priority', 'tickets.ticket_status', 'clients.company_name', 'clients.branch')
            ->join('clients', 'clients.id', '=', 'tickets.client_id')
            ->get();

        return response()->json(['data'=>$data]);
    }

    public function getOpenTickets(Request $request) {

        $data = DB::table('tickets')->select('tickets.id', 'tickets.help_topic', 'tickets.product', 'tickets.description', 'tickets.created_at', 'tickets.priority', 'tickets.ticket_status', 'clients.company_name', 'clients.branch')
            ->join('clients', 'clients.id', '=', 'tickets.client_id')
            ->where('tickets.ticket_status', "Open")
            ->get();

        return response()->json(['data'=>$data]);
    }

    public function getClosedTickets(Request $request) {

        $data = DB::table('tickets')->select('tickets.id', 'tickets.help_topic', 'tickets.product', 'tickets.description', 'tickets.created_at', 'tickets.priority', 'tickets.ticket_status', 'clients.company_name', 'clients.branch')
            ->join('clients', 'clients.id', '=', 'tickets.client_id')
            ->where('tickets.ticket_status', "Closed")
            ->get();

        return response()->json(['data'=>$data]);
    }

    public function getOwnedTickets(Request $request) {
        $current = Auth::user()->id;

        $data = DB::table('tickets')->select('tickets.id', 'tickets.help_topic', 'tickets.product', 'tickets.description', 'tickets.created_at', 'tickets.priority', 'tickets.ticket_status', 'clients.company_name', 'clients.branch')
            ->join('clients', 'clients.id', '=', 'tickets.client_id')
            ->where('tickets.user_id', $current)
            ->get();

        return response()->json(['data'=>$data]);
    }

    public function create() {

         $companies = Company::orderBy('company', 'asc')->get();//get data from table
         $sources = TicketSource::orderBy('source', 'asc')->get();
         $topics = HelpTopic::orderBy('topic', 'asc')->get();
         $departments = Department::orderBy('department', 'asc')->get();
         $assignees = User::orderBy('name', 'asc')-> role('agent')->get();
         $slaplans = SlaPlan::orderBy('sla_plan', 'asc')->get();
         $priorities = Priority::orderBy('priority', 'asc')->get();
         $products = Product::orderBy('product', 'asc')->get();
         $brands = Brand::orderBy('brand', 'asc')->get();
         $descriptions = Description::orderBy('description', 'asc')->get();

         return view('tickets.create',compact('companies', 'sources', 'topics', 'slaplans', 'departments',
                                              'brands', 'assignees', 'products', 'descriptions', 'priorities'));
    }

    public function changeStatus($id, AppMailer $mailer){
        $ticket = Ticket::where('id', $id)->first();
        $ticket->ticket_status = "Closed";
        $ticket->save();

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->ticket_id = $ticket->id;
        $comment->comment = "This ticket is closed/resolved.";
        $comment->save();

        //$mailer->sendTicketStatusNotification($ticket);
    }

    public function assignTicket($id, $agent){
        $ticket = Ticket::where('id', $id)->first();
        $ticket->assigned_to = $agent;
        $ticket->save();

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->ticket_id = $ticket->id;
        $comment->comment = "Assigned to new agent.";
        $comment->save();
    }

    public function store(Request $request, AppMailer $mailer){
        $this->validate($request, [
            'ticket_source' => 'required',
            'sla_plan' => 'required',
            'help_topic' => 'required',
            'department' => 'required',
            'product' => 'required',
            'priority' => 'required',
            'brand' => 'required',
            'warranty' => 'required',
            'description' => 'required'
        ]);

        $ticket = new Ticket([
            'assigned_to' => $request->get('assigned_to'),
            'department' => $request->get('department'),
            'help_topic' => $request->get('help_topic'),
            'priority' => $request->get('priority'),
            'product' => $request->get('product'),
            'brand' => $request->get('brand'),
            'ticket_source' => $request->get('ticket_source'),
            'description' => $request->get('description'),
            'product_summary' => $request->input('summary'),
            'sla_plan' => $request->get('sla_plan'),
            'remarks' => $request->get('remark'),
            'client_id' => $request->get('clientid'),
            'user_id'   => Auth::user()->id,
            'warranty' => $request->get('warranty'),
            'scheduled_date' => date('Y-m-d', strtotime($request->get('scheduled_date'))),
            'turn_over_date' => date('Y-m-d', strtotime($request->get('turn_over_date'))),
            'ticket_status' => "Open"
        ]);

        $ticket->save();

        error_log($request->selectedTags);
        $tags = explode('||', $request->selectedTags);
        foreach($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->tag = $tag;
            $new_tag->ticket_id = $ticket->id;
            $new_tag->save();
        }

        $client = Client::where('id', $ticket->client_id)->first();

        //$mailer->sendTicketInformation($ticket, $client);

        return redirect('tickets');
    }


    public function show($id) {

        $ticket = Ticket::where('id', $id)->firstOrFail();
        $client = Client::where('id', $ticket->client_id)->first();
        $user = User::where('id', $ticket->user_id)->first();
        $contacts = Contact::where('client_id', $ticket->client_id)->get();
        $comments = Comment::where('ticket_id', $ticket->id)->get();
        $assignees = User::orderBy('name', 'asc')-> role('agent')->get();
        $tags = Tag::where('ticket_id', $ticket->id)->get();
        return view('tickets.show', compact('ticket', 'client', 'contacts', 'user', 'comments', 'assignees', 'tags'));
    }
}
