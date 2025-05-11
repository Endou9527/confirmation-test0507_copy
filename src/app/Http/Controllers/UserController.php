<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;

class UserController extends Controller
{

    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function admin(){
        $contactData = Contact::all();
        return view('admin',['contactData'=>$contactData]);
    }
}
