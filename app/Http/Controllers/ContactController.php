<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|min:6|max:255',
            'email' => 'required|email|unique:contacts'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();

            return response()->json($errors,400);
        }
        
        $contacts = new Contact();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->save();
        
        return response()->json($contacts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'min:6|max:255',
            'email' => 'email|unique:contacts'.$contact->id
        ]);
        if($validator->fails()){
            $errors = $validator->errors();

            return response()->json($errors,400);
        }
        if($request->name){
            $contact->name = $request->name;
        }
        if($request->email){
            $contact->email = $request->email;
        }
        
        $contact->update();
        
        return response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json('Contato Excluido');
    }
}
