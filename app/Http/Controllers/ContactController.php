<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function getContacts(Request $request) {
        $data = Contact::select('id', 'contact_name', 'contact_number', 'email', 'label')
            -> where('client_id', $request->id)
            -> get();
            //->paginate($perPage);

        return response()->json(['data'=>$data]);
    }

    public function store(Request $request) {
        $contact = new Contact;
        $contact->contact_name = $request->name;
        $contact->contact_number = $request->number;
        $contact->email = $request->email;
        $contact->label = $request->label;
        $contact->client_id = $request->client_id;
        $contact->save();

        return $contact;
    }

    public function update(Request $request) {
        $contact = Contact::find($request->id);
        $contact->contact_name = $request->name;
        $contact->contact_number = $request->number;
        $contact->email = $request->email;
        $contact->label = $request->label;
        $contact->client_id = $request->client_id;
        $contact->save();

        return $contact;
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return response()->json(['done']);
    }
}
