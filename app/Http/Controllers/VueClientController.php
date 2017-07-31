<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Contact;
use App\Company;
use App\Branch;

class VueClientController extends Controller
{

    public function manageVue()
    {
        $comp = Company::orderBy('company', 'asc')->get();;
        return view('manage-vue',compact('comp'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::latest()->paginate(5);

        $response = [
            'pagination' => [
                'total' => $clients->total(),
                'per_page' => $clients->perPage(),
                'current_page' => $clients->currentPage(),
                'last_page' => $clients->lastPage(),
                'from' => $clients->firstItem(),
                'to' => $clients->lastItem()
            ],
            'data' => $clients
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'branch' => 'required',
            'address' => 'required',
        ]);

        $create = Client::create($request->all());

        $company = new Company;
        $company = Company::firstOrCreate(['company' => $request->company_name, 'sortcompany' => $request->company_name]);
        $company->save();

        $branch = new Branch;
        $branch->branch = $request->branch;
        $branch->branch_address = $request->address;
        $branch->company_id = $company->id;
        $branch->save();

        return response()->json($create);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'branch' => 'required',
            'address' => 'required',
        ]);

        $edit = Client::find($id)->update($request->all());

        return response()->json($edit);
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show',compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return response()->json(['done']);
    }
}
