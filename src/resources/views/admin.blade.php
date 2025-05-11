@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
@if(Auth::check())
<form class="form" action="/logout" method="post">
  @csrf
  <button class="logout-button">logout</button>
</form>
@endif
@endsection

@section('content')
<div class="admin-page">
  <div class="admin-page__container">
    <h2 class="form-container__page">Admin</h2>
  </div>

  <div class="search">
    <form action="">
      <input type="text" class="search__word" placeholder="名前やメールアドレスを入力してください"></input>
      <select class="search__gender">
        <option>性別</option>
        <option>全て</option>
        <option>男性</option>
        <option>女性</option>
        <option>その他</option>
      </select>
      <select class="search__category">
        <option value="category1">お問い合わせの種類</option>
        <option value="category1">1. 商品のお届けについて</option>
        <option value="category2">2. 商品の交換について</option>
        <option value="category3">3. 商品トラブル</option>
        <option value="category4">4. ショップへのお問い合わせ</option>
        <option value="category5">5. その他</option>  
      </select>
      <input type="date" class="search__date"></input>
      <button class="search-button">検索</button>
      <button class="reset-button">リセット</button>  
    </form>
  </div>

  <div class="users">
    <div class="export">
      <form>
        <button class="export-button">エクスポート</button>
      </form>  
    </div>
    
    <div class="user-table">
      <table>
        <thead>
          <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
          </tr>  
        </thead>

        <tbody>
        @foreach($contactData as $contact)
          <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category_id }}</td>
            <td><button class="user-table__detail">詳細</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection