<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function confirm(ContactRequest $request){
        $contactData = $request->only(['last_name','first_name','gender','email','tel1','tel2','tel3','address','address__building','category_id','detail']);
        // $tel = $tel1 . $tel2 . $tel3;
        return view('confirm',compact('contactData'));
    }

    public function store(ContactRequest $request){
        $contactData = $request->only(['last_name','first_name','gender','email','tel1','tel2','tel3','address','address__building','category_id','detail']);
        Contact::create($contactData);
        return view('thanks');
    }
}
