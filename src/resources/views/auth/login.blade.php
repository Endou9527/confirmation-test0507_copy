@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
{{-- buttonで"register"アクションだとルーティングかぶる --}}
<!-- <form class="form" action="/register" method="post">
  @csrf -->
  <a href="/register" class="register-button">register</a>
<!-- </form> -->
@endsection

@section('content')
  <div class="login-page">
    <div class="form-container">
      <h2 class="form-container__page">Login</h2>
    </div>
  
    <div class="login__card">
      <form class="login" action="/login" method="post">
        @csrf
        <div class="login-email">
          <label for="login-email__label" class="label">メールアドレス</label>
          <input type="email" name="email" id="login-email__label" class="form-input" placeholder="例：test@example.com">
        </div>
        <div class="login-password">
          <label for="login-password__label" class="label">パスワード</label>
          <input type="password" name="password" id="login-password__label" class="form-input" placeholder="coachtech1106">
        </div>
  
        <div class="button">
          <button class="login__button" type="submit">ログイン</button>
        </div>
      </form>
    </div>        
  </div>
@endsection