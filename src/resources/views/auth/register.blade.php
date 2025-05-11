@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('button')
<form class="form" action="/login" method="post">
  @csrf
  <button class="login-button">login</button>
</form>
@endsection

@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif

@section('content')
<div class="register-page">
  <div class="form-container">
    <h2 class="form-container__page">Register</h2>
  </div>

  <div class="register__card">
    <form class="register" action="/register" method="post">
      @csrf
      <div class="register-name">
        <label for="register-name__label" class="label">お名前</label>
        <input type="text" id="register-name__label" name="name" class="form-input" placeholder="例：山田　太郎">
      </div>
      <div class="register-email">
        <label for="register-email__label" class="label">メールアドレス</label>
        <input type="email" id="register-email__label" name="email" class="form-input" placeholder="例：test@example.com">
      </div>
      <div class="register-password">
        <label for="register-password__label" class="label">パスワード</label>
        <input type="password" id="register-password__label" name="password" class="form-input" placeholder="coachtech1106">
      </div>

      <div class="button">
        <button class="register__button" type="submit">登録</button>
      </div>
    </form>
    <div class="success-message">
      {{-- @if()
      登録しました--}}
    </div>        
  </div>
</div>

 @endsection