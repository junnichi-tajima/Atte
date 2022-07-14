@extends('layouts.default')
@section('title','index')

<style>
  /* .main2 {
    width: 100%;
    height: 100vh;
    background-color: aqua
  } */

  h2 {
    text-align: center;
  }

  .parent_index {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    /* background-color: lightgray; */
    margin: 0px 100px 0px 100px;
    width: 60%;
    height: 60%;
    gap: 50px;
    box-sizing: border-box;
    margin: 0 auto
  }

  .div1 {
    grid-area: 1 / 1 / 2 / 2;
    background-color: lightgray;
    /* padding: 100px; */
    /* margin: 100px; */
    position: relative;
    box-sizing: border-box;
    /* text-align: center; */
    /* vertical-align: middle; */
  }

  .div2 {
    grid-area: 1 / 2 / 2 / 3;
    background-color: lightgray;
    /* padding: 100px; */
    position: relative;
    box-sizing: border-box;
  }

  .div3 {
    grid-area: 2 / 1 / 3 / 2;
    background-color: lightgray;
    /* padding: 100px; */
    position: relative;
    box-sizing: border-box;
  }

  .div4 {
    grid-area: 2 / 2 / 3 / 3;
    background-color: lightgray;
    /* padding: 100px; */
    position: relative;
    box-sizing: border-box;
  }

  .button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* margin: 50px 100px 50px 100px; */
    width: 100%;
    height: 100%;
    transition: all 1.0s 0s ease;
    font-weight: bold;
    font-size: 24px;
  }

  /* .button:hover {
    background-color: red;
  } */
</style>

@section('content')
<div class="main2">
  <h2>{{ $rest_start_time }}さんお疲れ様です！</h2>
  <div class="parent_index">
    <div class="div1">
      <form action="/start" method="post">
        @csrf
        @if ( is_null($start_time))
        <button type="submit" class='button' href='/start'' >勤務開始</button>
        @else
        <button type="submit" class='button' href='/start'' disabled>勤務開始済</button>
      @endif
      </form>
    </div>
    <div class="div2">
      <form action="/end" method="post">
        @csrf
      <button type="submit" class="button" href="/">勤務終了</button>
      </form>
    </div>
    <div class="div3">
      <form action="/rest/start" method="post">
        @csrf
        @if ( is_null($rest_start_time))
      <button type="submit"class="button" href="/">休憩開始</button>
        @else
      <button type="submit"class="button" href="/" disabled>休憩開始</button>
        @endif
      </form>
    </div>
    <div class="div4">
      <form action="/rest/end" method="post">
        @csrf
      <button type="submit" class="button" href="/">休憩終了</button>
      </form>
    </div>
  </div>
</div>
@endsection