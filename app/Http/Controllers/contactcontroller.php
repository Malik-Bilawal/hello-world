<?php

namespace App\Http\Controllers;

use App\Models\contacttbl;
use Illuminate\Http\Request;

class contactcontroller extends Controller
{
// contname
// contnumber
// contmsg


public function addcontact(Request $request)
{
    $contact = new contacttbl();
    $contact->contact_name = $request->contname;
    $contact->contact_number = $request->contnumber;
    $contact->contat_msg = $request->contmsg;
    $contact->save();

    return redirect()->back()->with('success', 'Contact added successfully.');
}


public function showcontact()
{
$cont = contacttbl::all();

return view('Admin.contact' , compact('cont'));


}



}
