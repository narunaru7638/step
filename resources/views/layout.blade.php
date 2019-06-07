<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('page-title')
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Source+Serif+Pro" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="l-header">
        <div class="l-header__container">
            <div class="l-header__title-area">
                <h1 class="l-header__site-logo">STEP</h1>
                <h2 class="l-header__sub-title">あなたの人生の「STEP」を共有しよう</h2>
            </div>
            <ul class="l-header__category-list">
                <li class="l-header__category-list-item"><a href="" class="l-header__category-link">プログラミング</a></li>
                <li class="l-header__category-list-item"><a href="" class="l-header__category-link">ダイエット</a></li>
                <li class="l-header__category-list-item"><a href="" class="l-header__category-link">英語</a></li>
                <li class="l-header__category-list-item"><a href="" class="l-header__category-link">ビジネススキル</a></li>
                <li class="l-header__category-list-item"><a href="" class="l-header__category-link">スポーツ</a></li>
            </ul>
            <nav class="l-header__global-nav">
                <ul class="c-nav">
                @if(Auth::check())
                            <li class="c-nav__item"><a class="c-nav__link" href="">STEP登録</a></li>
                            <li class="c-nav__item"><a class="c-nav__link" href="">マイページ</a></li>
                            <li class="c-nav__item"><a class="c-nav__link" id="logout" href="#">ログアウト</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                @else
                            <li class="c-nav__item"><a class="c-nav__link" href="{{ route('login') }}">ログイン</a></li>
                            <li class="c-nav__item"><a class="c-nav__link" href="{{ route('register') }}">ユーザ登録</a></li>
                @endif
                </ul>
            </nav>


            <div class="l-sp-menu js-toggle-sp-menu-target">
                <div class="l-sp-menu__wrap-list">
                    <ul class="l-sp-menu__category-list">
                        <li class="l-sp-menu__category-list-item"><a href="" class="l-sp-menu__category-list-link">プログラミング</a></li>
                        <li class="l-sp-menu__category-list-item"><a href="" class="l-sp-menu__category-list-link">ダイエット</a></li>
                        <li class="l-sp-menu__category-list-item"><a href="" class="l-sp-menu__category-list-link">英語</a></li>
                        <li class="l-sp-menu__category-list-item"><a href="" class="l-sp-menu__category-list-link">ビジネススキル</a></li>
                        <li class="l-sp-menu__category-list-item"><a href="" class="l-sp-menu__category-list-link">スポーツ</a></li>
                    </ul>
                    <nav class="l-sp-menu__global-nav">
                        <ul class="l-sp-menu__nav">
                            @if(Auth::check())
                                <li class="l-sp-menu__nav-item"><a class="l-sp-menu__nav-link" href="">STEP登録</a></li>
                                <li class="l-sp-menu__nav-item"><a class="l-sp-menu__nav-link" href="">マイページ</a></li>
                                <li class="l-sp-menu__nav-item"><a class="l-sp-menu__nav-link" id="logout" href="#">ログアウト</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <li class="l-sp-menu__nav-item"><a class="l-sp-menu__nav-link" href="{{ route('login') }}">ログイン</a></li>
                                <li class="l-sp-menu__nav-item"><a class="l-sp-menu__nav-link" href="{{ route('register') }}">ユーザ登録</a></li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>

            <div class="c-menu-hamburger js-toggle-sp-menu">
                <span class="c-menu-hamburger__line js-toggle-sp-menu-target"></span>
                <span class="c-menu-hamburger__line js-toggle-sp-menu-target"></span>
                <span class="c-menu-hamburger__line js-toggle-sp-menu-target"></span>
            </div>

        </div>
    </header>

    @yield('content')

    <footer id="footer" class="l-footer">
        <h1 class="l-footer__title">STEP</h1>
        <h2 class="l-footer__sub-title">あなたの人生の「STEP」を共有しよう</h2>
        <nav class="l-footer__page-list">
            <ul class="l-footer__nav">
                @if(Auth::check())
                    <li class="l-footer__list-item"><a class="l-footer__link" href="">STEP登録</a></li>
                    <li class="l-footer__list-item"><a class="l-footer__link" href="">マイページ</a></li>
                    <li class="l-footer__list-item"><a class="l-footer__link" href="#">ログアウト</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="l-footer__list-item"><a class="l-footer__link" href="{{ route('login') }}">ログイン</a></li>
                    <li class="l-footer__list-item"><a class="l-footer__link" href="{{ route('register') }}">ユーザ登録</a></li>
                @endif
            </ul>
        </nav>
        <p class="l-footer__text">Copyright © <a href="https://twitter.com/narumismis" class="l-footer__link">なる</a>. All Rights Reserved</p>
    </footer>
    @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function(event){
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>
    @endif
    <script   src="https://code.jquery.com/jquery-3.0.0.min.js"   integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="   crossorigin="anonymous"></script>
    <script src="js/bundle.js"></script>
</body>
</html>