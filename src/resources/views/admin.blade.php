@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('button')
  <a href="/login" class="logout-button">logout</a>
@endsection

@section('content')
{{-- @if()--}}
<div class="login__alert">
  <div class="login__alert--success">
    ログインしました！
  </div>
</div>


<div class="admin-page">
  <div class="admin-page__container">
    <h2 class="form-container__page">Admin</h2>
  </div>

  <div class="search">
    <form class="search-form" action="/admin/search" method="get">
      @csrf
      <input class="search__word" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください"></input>
      
      <select class="search__gender" name="gender">
        <option value="">性別</option>
        <option value="">全て</option>
        @foreach($genders as $gender)
        <option value="{{ $gender }}" {{ request('gender') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
        @endforeach
      </select>

      <select class="search__category" name="category_id">
        <option value="">お問い合わせの種類</option>
        @foreach($categories as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select>

      <input type="date" class="search__date" name="date">
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
            <th></th>  {{-- 詳細ボタンで必要 --}}
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
            <td>
              <details>
                <summary>
                  <a class="modal-open-button">詳細</a>
                  <div class="modal-overlay"></div>
                </summary>
                <div class="modal-wrapper">
                  <div class="modal-header">
                    <div class="space"></div>
                    <div class="close">&times;</div>
                  </div>
                  <div class="modal-content">
                    <div class="modal-content__name-field">
                      <lavel>お名前</lavel>
                      <div class="">{{ $contact->name }}</div>
                    </div>

                    <div class="modal-content__gender-field">
                      <lavel>性別</lavel>
                      <div class="">{{ $contact->gender }}</div>
                    </div>

                    <div class="modal-content__email-field">
                      <lavel>メールアドレス</lavel>
                      <div class="">{{ $contact->email }}</div>
                    </div>

                    <div class="modal-content__tel-field">
                      <lavel>電話番号</lavel>
                      <div class="">{{ $contact->tel }}</div>
                    </div>

                    <div class="modal-content__address-field">
                      <lavel>住所</lavel>
                      <div class="">{{ $contact->address }}</div>
                    </div>

                    <div class="modal-content__address_building-field">
                      <lavel>建物名</lavel>
                      <div class="">{{ $contact->address__building }}</div>
                    </div>

                    <div class="modal-content__category-field">
                      <lavel>お問い合わせの種類</lavel>
                      <div class="">{{ $contact->category->name ?? '不明' }}</div>
                    </div>

                    <div class="modal-content__detail-field">
                      <lavel>お問い合わせ内容</lavel>
                      <div class="">{{ $contact->detail }}</div>
                    </div>
                </div>
              </details>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection