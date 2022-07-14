@extends('layouts.default')
@section('title','index')

<style>
  body {
    width: 100%;
    height: 100vh;
  }

  .login_container {
    width: 50%;
    height: 60%;
    background-color: aqua;
    left: 50%;
    top: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;

  }

  .rejister_form {
    display: flex;
    flex-direction: column;
    padding-left: 20%;
    padding-right: 20%;
    text-align: center;
  }

  input {
    margin-bottom: 10px;
    font-size: 24px;
  }

  .submit_button {
    background-color: blue;
    color: white;
    border-radius: 10px;
    font-size: 24px;
  }
</style>

@section('content')
  <div class="login_container">
    <h2>会員登録</h2>
    <form class="rejister_form" method="POST" action="{{ route('register') }}">
      @csrf
      <input type="text" name="name" placeholder="名前" id="name" :value="old('name')" required autofocus>
      <input type=" email" name="email" placeholder="メールアドレス" id="" :value="old('email')" required>
      <input type="password" name="password" placeholder="パスワード" id="" autocomplete="new-password" required>
      <input type="password" name="password_confirmation" placeholder="確認用パスワード" id="" required
        autocomplete="new-password">

        <a href="{{ __('Register') }}">会員登録</a>
      <input class="submit_button" type="submit" value="会員登録">
      <p>アカウントをお持ちの方はこちらから</p>
      <a href="{{ route('login') }}">ログイン</a>
    </form>
  </div>
@endsection