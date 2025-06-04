<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
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
        $contactData = Contact::with('category')->paginate(7);
        $categories = Category::pluck('name','id');
        $genders = Contact::select('gender')->distinct()->pluck('gender')->toArray();

        return view('admin',compact('contactData','categories','genders'));
    }
}
