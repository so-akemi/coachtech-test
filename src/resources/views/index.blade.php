@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>

  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
  <div class="form__group-title">
    <span class="form__label--item">お名前</span>
    <span class="form__label--required">※</span>
  </div>
  <div class="form__group-content">
    <div class="form__input--text">
      <div class="form__input--unit">
        <input type="text" name="last_name" placeholder="例 山田" value="{{ old('last_name') }}" />
        <div class="form__error">
          @error('last_name')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form__input--unit">
        <input type="text" name="first_name" placeholder="例 太郎" value="{{ old('first_name') }}" />
        <div class="form__error">
          @error('first_name')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--radio">
          <label><input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}><span>男性</span></label>
          <label><input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }} /><span>女性</span></label>
          <label><input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }} /><span>その他</span></label>
        </div>
        <div class="form__error">
          @error('gender') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
      </div>
    </div>
    {{-- メールアドレス --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          @error('email') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
      </div>
    </div>
    {{-- 電話番号 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--tel-group">
          <input type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}" />
          <span class="form__input--tel-separator">-</span>
          <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
          <span class="form__input--tel-separator">-</span>
          <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
        </div>
        <div class="form__error">
          @if($errors->hasAny(['tel1', 'tel2', 'tel3']))
           <p style="color: red;">
            {{ $errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3') }}
          </p>
          @endif
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例 東京都渋谷区..." value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          @error('address') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
      </div>
    </div>
    {{-- 建物 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例 千駄ヶ谷マンション101" value="{{ old('building') }}" />
        </div>
      </div>
    </div>
    {{-- お問い合わせの種類 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--select">
          <select name="category_id">
            <option value="" selected disabled>選択してください</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->content }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form__error">
          @error('category_id') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
      </div>
    </div>
    {{-- お問い合わせ内容 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
        </div>
        <div class="form__error">
          @error('content') <p style="color: red;">{{ $message }}</p> @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection