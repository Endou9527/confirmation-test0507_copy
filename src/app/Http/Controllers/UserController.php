<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;

class UserController extends Controller
{

    public function register(){
        session()->flash('registerMessage','ユーザ登録しました');
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function admin(){
        $contactData = Contact::with('category')->paginate(7);
        $categories = Category::pluck('name','id');
        $genders = Contact::select('gender')->distinct()->pluck('gender')->toArray();

        session()->flash('loginMessage','ログインしました');
        return view('admin',compact('contactData','categories','genders'));
    }

    public function logout(Request $request){
        Auth::logout(); // ログアウト処理

    $request->session()->invalidate(); // セッションを無効化
    $request->session()->regenerateToken(); // CSRFトークンを再生成

    return redirect('/login');
    }
}
