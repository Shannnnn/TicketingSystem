<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Branch;

class TestController extends Controller
{

    public function compfunct(){

        $comp=Company::all();//get data from table
        return view('companylist',compact('comp'));//sent data to view

    }

    public function findBranchName(Request $request){


        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data=Branch::select('branch','id')->where('company_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }


    public function findAddress(Request $request){

        //it will get price if its id match with product id
        $p=Branch::select('branch_address')->where('company_id',$request->id)->first();

        return response()->json($p);
    }

}