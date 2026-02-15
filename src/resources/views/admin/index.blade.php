@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>

  <div class="search-form">
    <form class="search-form__inner" action="/admin/search" method="get">
      <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
      
      <select name="gender">
       <option value="">性別</option>
       <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
       <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
       <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
      </select>

      <select name="category_id">
        <option value="">お問い合わせの種類</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->content }}
          </option>
        @endforeach
      </select>

      <input type="date" name="date" value="{{ request('date') }}">
      
      <button class="search-form__button-submit" type="submit">検索</button>
      <a href="/admin" class="search-form__button-reset">リセット</a>
    </form>
  </div>

  <div class="admin-tools">
    <a href="{{ route('admin.export', request()->query()) }}" class="export-btn">エクスポート</a>
    {{ $contacts->links() }}
  </div>

  <table class="admin-table">
    <tr class="admin-table__header">
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>お問い合わせの種類</th>
      <th></th>
    </tr>
    @foreach ($contacts as $contact)
    <tr class="admin-table__row">
      <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
      <td>{{ $contact->gender_label }}</td>
      <td>{{ $contact->email }}</td>
      <td>{{ $contact->category->content }}</td>
      <td>

        <a class="detail-btn" href="#modal-{{ $contact->id }}">詳細</a>

        <div id="modal-{{ $contact->id }}" class="modal-overlay">
          <div class="modal-window">
            <a href="#" class="modal-close-btn">✕</a>

            <div class="modal-inner">
              <table class="modal-table">
                <tr><th>お名前</th><td>{{ $contact->last_name }} {{ $contact->first_name }}</td></tr>
                <tr><th>性別</th><td>{{ $contact->gender_label }}</td></tr>
                <tr><th>メールアドレス</th><td>{{ $contact->email }}</td></tr>
                <tr><th>電話番号</th><td>{{ $contact->tel }}</td></tr>
                <tr><th>住所</th><td>{{ $contact->address }}</td></tr>
                <tr><th>建物名</th><td>{{ $contact->building }}</td></tr>
                <tr><th>お問い合わせの種類</th><td>{{ $contact->category->content }}</td></tr>
                <tr><th>お問い合わせ内容</th><td>{{ $contact->detail }}</td></tr>
              </table>

              <form action="{{ route('admin.delete', ['id' => $contact->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-delete">
                  <button type="submit" class="delete-btn" onclick="return confirm('本当に削除しますか？')">削除</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection