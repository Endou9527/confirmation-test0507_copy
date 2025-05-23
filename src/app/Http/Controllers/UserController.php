<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;

class UserController extends Controller
{

    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function logout(){
        return view('auth.login');
    }

    public function admin(){
        $contactData = Contact::with('category')->get();
        $categories = Category::all();

        return view('admin',compact('contactData','categories'));
    }
}
