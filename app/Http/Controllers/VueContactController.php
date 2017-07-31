<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Contact;

class VueContactController extends Controller
{

    public function manageVue()
    {
        return view('manage-vue');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            return Contact::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
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
            'contact_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'label' => 'required',
            'client_id',
        ]);

        $create = Contact::create($request->all());

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
            'contact_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'label' => 'required',
        ]);

        $edit = Contact::find($id)->update($request->all());

        return response()->json($edit);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show',compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return response()->json(['done']);
    }
}
