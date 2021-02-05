<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create(){

        return view('mails.form');
    }
    

    public function submit(MailRequest $request){

        $number =$request->number;
        $address = $request->address;
        $body = $request->body;
        $mail=Auth::user()->email;
        $name=Auth::user()->name;
        $revisorRequest= compact('number','address','body','mail','name');
        Mail::to($mail)->send(New ContactMail($revisorRequest));
        return redirect(route('home'))->with('request.send','La tua richiesta è stata inviata correttamente');
    }

    

   




}
