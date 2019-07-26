@extends('layout')

@section('page-title')
    <title>ユーザ登録 | STEP</title>
    <meta name="description" content="ユーザ登録ページです。メールアドレス、ニックネーム、パスワードを登録することで、学習順序共有サイト「STEP」はすぐに利用できます。">
    <meta name="keywords" content="努力,目標,達成,順序,学習,登録,ユーザ登録">
@endsection

@section('content')
<div class="l-home">
    <div class="l-page-title">
        <h2 class="l-page-title__title">SIGN UP</h2>
        <h3 class="l-page-title__sub-title">ユーザ登録ページ</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">
                <form class="c-form" method="POST" action="{{ route('register') }}">
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
                        <label for="name" class="c-form__label">ユーザネーム(他人に公開されます)</label>
                        <input type="text" class="c-form__input" id="name" name="name" value="{{ old('name') }}">
                        @if($errors->any())
                            @foreach($errors->get('name') as $message)
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

                    <div class="c-form__input-area">
                        <label for="password-confirm" class="c-form__label">パスワード(再入力)</label>
                        <input type="password" class="c-form__input" id="password-confirm" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @if($errors->any())
                            @foreach($errors->get('password_confirmation') as $message)
                        <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>

                    <input type="submit" class="c-btn c-form__submit" value="登録する">
                </form>
            </main>
        </div>
    </div>
</div>
@endsection