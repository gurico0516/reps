<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>reps</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container">

        <div class="logo float-left">
          <h1 class="text-light"><a href="{{ route('home') }}"><span>reps</span></a></h1>
        </div>

        <nav class="nav-menu float-right d-none d-lg-block">
          <ul>
            <li class="active"><a href="{{ route('home') }}">ホーム</a></li>
            <li><a href="{{ route('index') }}">みんなの投稿</a></li>
            <li><a href="{{ route('create') }}">投稿してみる</a></li>
            @if (Auth::check())
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            @else
              <li><a href="{{ route('login') }}">ログイン</a></li>
              <li><a href="{{ route('register') }}">会員登録</a></li>
            @endif
          </ul>
        </nav><!-- .nav-menu -->

      </div>
    </header><!-- End #header -->

    <main class="py-4">
        @yield('content')
    </main>
</body>

<!-- ======= Footer ======= -->
<footer id="footer">
  <!-- Vendor JS Files -->
  <script src="{{ asset('js/app.js') }}"></script>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>reps</span></strong>. All Rights Reserved
      </div>
    </div>
</footer><!-- End #footer -->

</html>
