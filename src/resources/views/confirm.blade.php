@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="../css/confirm.css">
@endsection

@section('content')
<div class="confirm-page">
  <div class="form-container">
    <h2 class="form-container__page">Confirm</h2>
  </div>

  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="hidden" name="last_name" value="{{ $contactData['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contactData['first_name'] }}">
            <input type="text" name="name" value="{{ $contactData['last_name']}}  {{ $contactData['first_name'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="hidden" name="gender" value="{{ $contactData['gender'] }}" readonly />
            <input type="text" value="{{ $contactData['gender'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="hidden" name="email" value="{{ $contactData['email'] }}" />
            <input type="email" value="{{ $contactData['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            {{-- <input type="hidden" name="tel1" value="{{ $contactData['tel1'] }}" />
            <input type="hidden" name="tel2" value="{{ $contactData['tel2'] }}" />
            <input type="hidden" name="tel3" value="{{ $contactData['tel3'] }}" /> --}}
            <input type="tel" value="{{ $contactData['tel'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="hidden" name="address" value="{{ $contactData['address'] }}" />
            <input type="text" value="{{ $contactData['address'] }}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="hidden" name="address__building" value="{{ $contactData['address__building'] }}" />
            <input type="text" value="{{ $contactData['address__building'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <input type="hidden" name="category" value="{{ $contactData['category_id'] }}" />
            <input type="text" value="{{ $contactData['category_id'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="hidden" name="detail" value="{{ $contactData['detail'] }}" />
            <input type="text" value="{{ $contactData['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
  </form>
</div>
@endsection

