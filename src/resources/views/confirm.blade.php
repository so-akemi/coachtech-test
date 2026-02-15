@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
    <div class="confirm-form__content">
      <div class="confirm-form__heading">
        <h2>Confirm</h2>
      </div>
      <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
              </td>
            </tr>
            <tr class="confirm-table__row">
             <th class="confirm-table__header">性別</th>
             <td class="confirm-table__text">
             {{ $contact['gender_text'] }}
             <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
             </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                {{ $contact['email'] }}
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
              {{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}
              <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
              <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
              <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
              {{ $contact['address'] }}
              <input type="hidden" name="address" value="{{ $contact['address'] }}">
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物</th>
              <td class="confirm-table__text">
              {{ $contact['building'] }}
              <input type="hidden" name="building" value="{{ $contact['building'] }}">
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
              {{ $contact['category_content'] }}
              <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                {{ $contact['content'] }}
                <input type="hidden" name="content" value="{{ $contact['content'] }}">
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
          <a class="form__button-back" href="/" onclick="history.back()">修正</a>
        </div>
      </form>
    </div>
  @endsection
