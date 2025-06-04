@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <select class="search__gender" name="gender">
        <option>性別</option>
        <option value="">全て</option>
        @foreach($genders as $gender)
        <option value="{{ $gender }}" {{ request('gender') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
        @endforeach
      </select>
      <select class="search__category" name="category_id">
        <option value="category1">お問い合わせの種類</option>
        @foreach($categories as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
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
    
    {{ $contactData->appends(request()->query())->links('pagination::custom') }}
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
            <td>{{-- {{ $contact->last_name }} {{ $contact->first_name }} --}}
            {{ $contact->name }}
            </td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->name ?? '不明' }}</td>
            <td><button class="user-table__detail">詳細</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection