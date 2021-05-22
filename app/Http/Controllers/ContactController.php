<?php

namespace App\Http\Controllers;

//use App\Http\Requests\ContactRequest as Request;
use App\Models\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $form = ['route' => 'contact.store', "id" => "contact", "method" => "POST"];
        return view('front.contact', compact('form'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'address' => ''
            , 'email' => 'required|email'
            , 'tel' => ''
            , 'body' => 'required|min:30'
            , 'g-recaptcha-response' => 'required|captcha'
        ]);
        //$validated = $request->validated();
        ContactRequest::create($request->all(['name', 'email', 'body', 'address']));
        return redirect()->route('contact.index')->with(['success' => 'Enviado com sucesso!']);
    }
}
