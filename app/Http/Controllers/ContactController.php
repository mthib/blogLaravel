<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    function create() {
        $contacts = \App\Contact::All();
        return view('contact',array(
            'contacts' => $contacts
            ));
    }
    public function store(ContactRequest $request)
    {
        $contact = new \App\Contact(); //on instancie un nouveau projet
        $contact->contact_name = request('contact_name'); //on set le titre avec la donnée envoyée du formulaire
        $contact->contact_email = request('contact_email');
        $contact->contact_message = request('contact_message');
        $contact->contact_date = date("Y-m-d H:i:s");
        $contact->timestamps = false;
        $contact->save(); // on enregistre dans la base
        return redirect('/contact'); // méthode pour rediriger vers une autre url (en get par défaut)
    }

}
