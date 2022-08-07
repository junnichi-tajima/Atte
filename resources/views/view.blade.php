@extends('layouts.default')
@section('title','view')
<style>

  .view_header {
    background-color: aqua;
    padding-top: 50px;
    padding-bottom: 20px;
    ;
  }

  .date_container {
    width: 0%;
    height: 30px;
    /* background-color: blue; */
    display: flex;
    align-items: flex-start;
    margin: 0 auto;
    /* margin-top: 50px; */
    /* margin-bottom: 50px; */
    vertical-align: top;
    /* position: relative; */
  }

  p {
    top: 0px;
    /* margin-left: 20px;
    margin-right: 20px; */
    /* position: absolute; */
  }

  button {
    /* margin-right: 50px; */
    /* margin-left: 50px; */
  }

  .view-container {
    width: 100%;
    height: 10%;
    /* background-color: lightblue; */
  }

  .view_table {
    width: 90%;
  }
  .nav-links{
  padding:2em;
  display:flex;
  justify-content:center;
  background:#f3f3f3;
}
</style>
@section('content')
<div>
  <div class="view_header">
    <!-- box0 -->
    <div class="date_container">
      <form action="/view/{{ $prev }}" method="get">
        <button>＜</button>
      </form>
      <div>{{ $dt }}</div>
      <form action="/view/{{ $next }}" method="get">
        <button>＞</button>
      </form>
    </div>
  </div>
  <div class="view-container">
    <table border="1" class="view_table">
      <tr>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->start_time }}</td>
        <td>{{ $item->end_time }}</td>
        <td>{{ $item->rest_time_total }}</td>
        <td>{{ $item->work_time }}</td>
      </tr>
      @endforeach
    </table>
    {{ $items->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection