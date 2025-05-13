@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
  <div class="contact-page">
    <div class="form-container">
        <h2 class="form-container__page">Contact</h2>
    </div>
  </div>

  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form-group">
      <label class="form-label">お名前 <span class="required">※</span></label>
      <div class="name-fields">
        <div class="name-fields__input">
          <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
          <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
        </div>
        <div class="form__error">
          @error('last_name')
          {{ $message }}
          @enderror
          @error('first_name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">性別 <span class="required">※</span></label>
      <div class="gender-fields">
        <div class="genderfields__input">
          <label><input type="radio" name="gender" value="男性" {{ old('gender')  == '男性' ? 'checked': '' }}> 男性</label>
          <label><input type="radio" name="gender" value="女性" {{ old('gender')  == '女性' ? 'checked': '' }}> 女性</label>
          <label><input type="radio" name="gender" value="その他" {{ old('gender')  == 'その他' ? 'checked': '' }}> その他</label>
          <div class="form__error">
            @error('gender')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">メールアドレス <span class="required">※</span></label>
      <div class="email-fields">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">電話番号 <span class="required">※</span></label>
      <div class="tel-fields">
        <div class="tel-fields__input">
          <input type="tel" name="tel1" value="{{ old('tel1') }}" placeholder="080"> -
          <input type="tel" name="tel2" value="{{ old('tel2') }}" placeholder="1234"> -
          <input type="tel" name="tel3" value="{{ old('tel3') }}" placeholder="5678">
        </div>
        <div class="form__error">
          @error('tel1')
          {{ $message }}
          @enderror
          @error('tel2')
          {{ $message }}
          @enderror
          @error('tel3')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">住所 <span class="required">※</span></label>
      <div class="address-fields">
        <input type="text" name="address" value="{{ old('address') }}"  placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
        <div class="form__error">
          @error('address')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">建物名</label>
      <div class="building-fields">
        <input type="text" name="address__building" value="{{ old('address__building') }}" placeholder="例: 千駄ヶ谷マンション101">
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">お問い合わせの種類 <span class="required">※</span></label>
      <div class="category-fields">
       <select name="category_id">
          <option value="">選択してください</option>
          <option value="1. 商品のお届けについて" {{ old('category_id')== '1. 商品のお届けについて' ? 'selected' : '' }}>1. 商品のお届けについて</option>
          <option value="2. 商品の交換について" {{ old('category_id')== '2. 商品の交換について' ? 'selected' : '' }}>2. 商品の交換について</option>
          <option value="3. 商品トラブル" {{ old('category_id')== '3. 商品トラブル' ? 'selected' : '' }}>3. 商品トラブル</option>
          <option value="4. ショップへのお問い合わせ" {{ old('category_id')== '4. ショップへのお問い合わせ' ? 'selected' : '' }}>4. ショップへのお問い合わせ</option>
          <option value="5. その他" {{ old('category_id')== '5. その他' ? 'selected' : '' }}>5. その他</option>
        </select> 
        <div class="form__error">
          @error('category_id')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">お問い合わせ内容 <span class="required">※</span></label>
      <div class="detail-fields">
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        <div class="form__error">
          @error('detail')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="button__form-group">
      <button class="button__confirm" type="submit">確認画面</button>
    </div>
  </form>
@endsection