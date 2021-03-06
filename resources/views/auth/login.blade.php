@extends('layout')

@section('page-title')
    <title>ログイン | STEP</title>
    <meta name="description" content="ログインページです。ログインして、学習順序共有サイト「STEP」を利用してみましょう。">
    <meta name="keywords" content="努力,目標,達成,順序,学習,ログイン">
@endsection

@section('content')
<div class="l-home">
    <div class="l-page-title">
        <h2 class="l-page-title__title">LOGIN</h2>
        <h3 class="l-page-title__sub-title">ログインページ</h3>
    </div>
    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">
                <form class="c-form" method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="c-form__input-area">
                        <label for="email" class="c-form__label">emailアドレス</label>
                        <input type="text" class="c-form__input" id="email" name="email" value="{{ old('email') }}">
                        @if($errors->any())
                            @foreach($errors->get('email') as $message)
                        <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="c-form__input-area">
                        <label for="password" class="c-form__label">パスワード</label>
                        <input type="password" class="c-form__input" id="password" name="password" value="{{ old('password') }}">
                        @if($errors->any())
                            @foreach($errors->get('password') as $message)
                        <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>
                    <input type="submit" class="c-btn c-form__submit" value="ログインする">
                    <div class="c-form__sub-msg">パスワードを忘れた方は<a href="{{ route('password.request') }}" class="c-form__link">こちら</a></div>
                </form>
            </main>
        </div>
    </div>
</div>
@endsection