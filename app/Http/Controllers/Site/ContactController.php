<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use function Ramsey\Uuid\v1;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.contact.index');
    }

    public function form(Request $request){
        // Método interessante para usar e buscar informações no request:
        //ddd($request);

        // Método antigo para criar:

        /*
        Contact::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'msg' => $request['message']
        ]);
        */

        //Método simplificado:
        $contact = Contact::create($request->all());
        Notification::route('mail', config('mail.from.address'))
        ->notify(new NewContact($contact));

        ddd($contact);
    }
}
