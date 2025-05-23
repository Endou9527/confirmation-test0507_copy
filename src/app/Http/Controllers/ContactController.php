<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function confirm(ContactRequest $request){
        $tel = $request -> input('tel1'). $request -> input('tel2'). $request -> input('tel3');
        $name = $request -> input('last_name'). $request -> input('first_name');
        $contactData = $request->only([ //'last_name','first_name',
        'gender','email', //'tel'
        'address','address__building','category_id','detail']);
        $contactData['tel'] = $tel;
        $contactData['name'] = $name;
        return view('confirm',compact('contactData'));
    }

    public function store(Request $request){
        $tel = $request -> input('tel1'). $request -> input('tel2'). $request -> input('tel3');
        $name = $request -> input('last_name'). $request -> input('first_name');
        $contactData = $request->only([//'last_name','first_name',
        'gender','email', //'tel',
        'address','address__building','category_id','detail']);
        $contactData['tel'] = $tel;
        $contactData['name'] = $name;
                dd($contactData);
        Contact::create($contactData);
        return view('thanks');
    }

    public function search(Request $request){
        $contactData = Contact::with('category')->KeywordSearch($request->keyword)->CategorySearch($request->category_id)->get();
        $categories = Category::all();

        return view('admin',compact('contactData','categories'));
    }
}
