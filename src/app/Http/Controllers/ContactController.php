<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact(){
        $categories = Category::all();
        return view('contact',compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contactData = $request->only([ //'last_name','first_name',
        'gender','email',
        'address','address__building','category_id','detail']);
        $tel = $request -> input('tel1'). $request -> input('tel2'). $request -> input('tel3');
        $name = $request -> input('last_name'). " " .$request -> input('first_name');
        $contactData['tel'] = $tel;
        $contactData['name'] = $name;
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('confirm',compact('contactData','categories'));
    }

    public function store(Request $request){
        // $tel = $request -> input('tel1'). $request -> input('tel2'). $request -> input('tel3');
        // $name = $request -> input('last_name'). $request -> input('first_name');
        // $contactData['tel'] = $tel;
        // $contactData['name'] = $name;
        $contactData = $request->only([//'last_name','first_name',
        'name',
        'gender','email', 'tel',
        'address','address__building','category_id','detail']);
        Contact::create($contactData);
        return view('thanks');
    }

    public function search(Request $request){
        // $contactData = Contact::with('name')->KeywordSearch($request->keyword)->CategorySearch($request->category_id)->paginate(7);
        // \DB::enableQueryLog();
        $contactData = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->date)->paginate(7);
        // dd(\DB::getQueryLog());

        $categories = Category::pluck('name','id');
        $genders = Contact::select('gender')->distinct()->pluck('gender');
        
        return view('admin',compact('contactData','categories','genders'));
    }
}
