<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>quizy</title>
  <script src="{{ '/js/app.js' }}" defer></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="{{ '/css/app.css' }}" rel="stylesheet">


</head>

<body>
  <div class="container">
    <h1>管理画面</h1>

    @if (session('login_msg'))
    <div class="alert alert-success">
      {{ session('login_msg') }}
    </div>
    @endif
    <div class="d-flex">
      @if (Auth::guard('administrators')->check())
      <div>ユーザーID {{ Auth::guard('administrators')->user()->userid }}でログイン中</div>
      @endif
      <div class="ml-auto">
        <a href="/admin/logout">ログアウト</a>
      </div>
    </div>
  
  @yield('content')
</div>
</body>

</html>