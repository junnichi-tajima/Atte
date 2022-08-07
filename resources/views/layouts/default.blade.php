<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
</head>
<style>
  body {
    width: 100%;
    height: 100vh;
    /* background-color: lightgray; */
    /* padding-top: 8%; */
  }


  div {
    /* border: 1px solid black; */
  }

  .parent {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 14fr 1fr;
  }

  .header {
    grid-area: 1 / 1 / 2 / 2;
    /* background-color: red; */
    display: flex;
    vertical-align: middle;
    font-size: 24px;
    padding: 10px 10px 10px 10px;
  }

  .menu {
    /* background-color: blue; */
    right: 0pc;
    margin-left: auto;
  }

  li {
    list-style: none;
    float: left;
    margin-right: 30px;
  }

  .main {
    grid-area: 2 / 1 / 3 / 2;
    /* background-color: green; */
  }

  .footer {
    grid-area: 3 / 1 / 4 / 2;
    /* background-color: blue; */
    text-align: center;
  }


</style>

<body>
  <div class="parent">
    <div class="header">
      <h2>Atte</h2>
      <ul class="menu">
      <li><a href="{{ Route('register') }}">rejister</a></li>
      <li><a href="/view">日付一覧</a></li>
        <li><a href="/login">login</a></li>
      </ul>
    </div>
    @yield('content')
    <div class="footer">
      <p>Atte.inc</p>
    </div>
  </div>
</body>

</html>