<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__left"></div>
    <div class="header__center">
      <h1 class="header-inner__title">FashionablyLate</h1>
    </div>
    <div class="header__right">
      @yield('button')
    </div>
  </header>

  <main class="main">
    @yield('content')
  </main>
</body>

</html>