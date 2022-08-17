
@extends('layouts.default')
@section('title','logon')
<style>

  .login_container {
    width: 80%;
    height: 50%;
    top: 50%;
    left: 50%;
    background-color: aqua;
    position: absolute;
    transform: translate(-50%, -50%);
    text-align: center;
    display: flex;
    flex-flow: column;
    padding-left: 100px;
    padding-right: 100px;
    box-sizing: border-box;
  }

  input {
    width: 100%;
    font-size: 24px;
    margin-bottom: 20px;
  }

  input:[type='submit'] {
    background-color: blue;
    margin: 10px 50px 10px 50px;
  }
</style>
@section('content')
    <div class="main">
      <div class="login_container">
        <h2>ログイン</h2>
        
        <!-- Validation Errors -->
        <x-auth-validation-errors class="" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <input type="email" name="email" placeholder="メールアドレス" id="">
        <input type="password" name="password" placeholder="パスワード" id="">
        <input type="submit" value="ログイン">
      </div>
    </div>
    @endsection