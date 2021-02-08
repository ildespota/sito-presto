<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create(){

        return view('mails.form');
    }
    

    public function submit(MailRequest $request){

        $number = $request->number;
        $address = $request->address;
        $body = $request->body;
        $ourMail = 'presto.info@libero.it';
        $mail=Auth::user()->email;
        $name=Auth::user()->name;
        $contact= compact('number','address','body','mail','name');
        Mail::to($ourMail)->send(New ContactMail($contact));
        Mail::to($mail)->send(New UserMail($contact));
        return redirect(route('home'))->with('request.send','La tua richiesta è stata inviata correttamente');
    }

    

   




}
