@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login__content">
      <div class="login__heading">
        <h2>Login</h2>
      </div>
      <div class="login-form__inner">
       <form class="login-form" action="/login" method="post" novalidate>
        @csrf
        <div class="login-form__group">
         <div class="login-form__group-title">
          <span class="login-form__label--item">メールアドレス</span>
         </div>
         <div class="login-form__group-content">
          <div class="login-form__input--text">
           <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
         </div>
         <div class="login-form__error">
           @error('email')
            {{ $message }}
           @enderror
         </div>
         </div>
        </div>

        <div class="login-form__group">
         <div class="login-form__group-title">
          <span class="login-form__label--item">パスワード</span>
         </div>
         <div class="login-form__group-content">
          <div class="login-form__input--text">
           <input type="password" name="password" placeholder="例: coachtech1106">
          </div>
          <div class="login-form__error">
           @error('password')
            {{ $message }}
           @enderror
          </div>
         </div>
        </div>

        <div class="login-form__error">
          @error('login')
            <p class="error-message" style="color: red; text-align: center; margin-bottom: 10px;">
              {{ $message }}
            </p>
          @enderror
        </div>

        <div class="login-form__button">
         <button class="login-form__button-submit" type="submit">ログイン</button>
        </div>
       </form>
      </div>

      <div class="register__link">
       <a class="register__button-link" href="/register">register</a>
      </div>
     </div>
    </div>
@endsection