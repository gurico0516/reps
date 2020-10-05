@extends('elements.layout')

@section('content')
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="{{ route('index') }}"><span>reps</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('index') }}">ホーム</a></li>
          <li><a href="#about">repsについて</a></li>
          <li><a href="#portfolio">魅力的な爬虫類</a></li>
          <li><a href="#">みんなの投稿</a></li>
          @guest
          <li class="drop-down"><a href="">ログイン</a>
            <ul>
                <li><a href="{{ route('login') }}">アカウントをお持ちの方</a></li>
                @if (Route::has('register'))
                  <li><a href="{{ route('register') }}">アカウントをお持ちでない方</a></li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
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
            </ul>
            @endguest
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>repsとは</h1>
      <h2>爬虫類の魅力をより多くの人に知ってもらえるサービスです！</h2>
      <a href="#about" class="btn-get-started scrollto">さっそくrepsに参加する！
      </a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>repsについて</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/about-img.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1">
            <h3>repsでできること</h3>
            <p class="font-italic">
              repsではこんなことができます！
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i>爬虫類の生態について詳しくなれる</li>
              <li><i class="icofont-check-circled"></i>爬虫類好きの間での交流 </li>
              <li><i class="icofont-check-circled"></i>好きな爬虫類についての投稿</li>
            </ul>
            <p>
              世の中では哺乳類である犬や猫が非常に人気で一般的です。そこで、より多くの人に爬虫類の魅力を知ってもらうことで
              神秘的で不思議な生き物である爬虫類にも興味を持ってほしいという思いからrepsは生まれました
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>魅力的な爬虫類</h2>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">ヘビ</li>
              <li data-filter=".filter-card">トカゲ</li>
              <li data-filter=".filter-web">カメ</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 filter-app">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-web">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-app">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-card">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-web">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-app">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-card">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-card">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-web">
            <div class="portfolio-item">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>よくある質問</h2>
        </div>

        <ul class="faq-list">

          <li>
            <a data-toggle="collapse" href="#faq1"  class="collapsed" >repsは無料で利用できますか？ <i class="icofont-simple-up"></i></a>
            <div id="faq1" class="collapse" data-parent=".faq-list">
              <p>
                はい！完全無料でご利用頂けます。
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">爬虫類にはどんな種類がいるのですか？ <i class="icofont-simple-up"></i></a>
            <div id="faq2" class="collapse" data-parent=".faq-list">
              <p>
                ヘビ、トカゲ、カメ、ワニなどがいます。
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">爬虫類の飼育は難しいですか？<i class="icofont-simple-up"></i></a>
            <div id="faq3" class="collapse" data-parent=".faq-list">
              <p>
                爬虫類は変温動物なので、周りの環境に合わせて体温が変化します。そのため、自分で体温を一定に保つことができないため飼育者は神経質になる必要がありますが、温度管理をしっかりとしてあげることで安心して飼育することができます。
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">爬虫類に触ったことがないのですが、爬虫類は噛んだりするのでしょうか？<i class="icofont-simple-up"></i></a>
            <div id="faq4" class="collapse" data-parent=".faq-list">
              <p>
                私たち人間がそれぞれ性格が異なるように爬虫類もそれぞれ性格があります。大人しい個体であれば噛むことはありませんが、気性の荒い個体であれば
                噛んでしまうこともあります。
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">爬虫類は肉食なんでしょうか？ <i class="icofont-simple-up"></i></a>
            <div id="faq5" class="collapse" data-parent=".faq-list">
              <p>
              爬虫類は肉食のイメージがつきがちですが、草食の爬虫類もいます。グリーンイグアナなどが良い例となります。
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">カエルも爬虫類の仲間ですか？ <i class="icofont-simple-up"></i></a>
            <div id="faq6" class="collapse" data-parent=".faq-list">
              <p>
                よく間違えられますが、カエルは両生類なので爬虫類ではありません。
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>reps</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End #footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

@endsection
