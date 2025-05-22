@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
  <a href="/login" class="logout-button">logout</a>
@endsection

@section('content')
<div class="admin-page">
  <div class="admin-page__container">
    <h2 class="form-container__page">Admin</h2>
  </div>

  <div class="search">
    <form class="search-form" action="/admin/search" method="get">
      @csrf
      <input class="search__word" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください"></input>
      <select class="search__gender">
        <option>性別</option>
        <option>全て</option>
        @foreach($contactData as $contact)
        <option value="{{ $contact['gender'] }}">{{ $contact['gender'] }}</option>
        @endforeach
      </select>
      <select class="search__category" name="category_id">
        <!-- <option value="category1">お問い合わせの種類</option> -->
        @foreach($categories as $category)
          <option value="{{ $category['category_id'] }}">{{ $category['name'] }}</option>
        @endforeach
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