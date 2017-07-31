<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Branch;
use App\Company;
use App\Client;
use App\Contact;

class ClientController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {
       return view('screens.clients');
    }

    public function getAllClients(Request $request) {
        $sort = $request->query('sort');
        $page = $request->query('page') ?: 1;
        $perPage = $request->query('per_page') ?: 10;
        $sortParams = explode("|", $sort ?: "company_name|asc");

        $data = Client::select('id', 'company_name', 'branch', 'address')
            ->orderBy($sortParams[0], $sortParams[1])
            ->get();
            //->paginate($perPage);

        return response()->json(['data'=>$data]);
    }

    public function getAllCompanies() {
        $data = Client::select('company_name')
            ->distinct()
            ->orderBy('company_name', 'asc')
            ->get();

        return $data;
    }

    public function store(Request $request) {
        $client = new Client;
        $client->company_name = $request->company != 'new' ? $request->company : $request->companyOther;
        $client->branch = $request->branch;
        $client->address = $request->address;
        $client->save();

        $company = new Company;
        $company = Company::firstOrCreate(['company' => $client->company_name, 'sortcompany' => $client->company_name]);
        $company->save();

        $branch = new Branch;
        $branch->branch = $request->branch;
        $branch->branch_address = $request->address;
        $branch->company_id = $company->id;
        $branch->save();

        return $client;
    }

    public function update(Request $request) {
        $client = Client::find($request->id);
        $client->company_name = $request->company != 'new' ? $request->company : $request->companyOther;
        $client->branch = $request->branch;
        $client->address = $request->address;
        $client->save();

        return $client;
    }

    public function destroy($id)
    {
        Client::find($id)->delete();
        Contact::where('client_id', $id)->delete();
        return response()->json(['done']);
    }
}
