<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Contact;
use App\Company;
use App\Branch;

class CompanyController extends Controller
{

    public function companyFunc(){

        $comp = Company::orderBy('company', 'asc')->get();//get data from table
        return view('create-ticket',compact('comp'));//sent data to view

    }

    public function findBranchName(Request $request){

        $data=Branch::select('branch', 'id', 'branch_address') -> where('company_id', $request -> id) -> get();
        return response()->json($data); //then send this data to ajax success
    }


    public function getAddress($company, $id){

        $data = Branch::select('branch_address') -> where('company_id', $company) -> where('id', $id) -> get();
        return $data;
    }

    public function getBranches($id) {
        $data = Branch::select('branch', 'id') -> where('company_id', $id) -> get();
        return $data;
    }
}