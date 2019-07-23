@extends('layout')

@section('page-title')
    <title>パスワード変更 | STEP</title>
    <meta name="description" content="パスワード変更ページです。古いパスワードと新しいパスワードを入力してください。">
    <meta name="keywords" content="努力,目標,達成,順序,学習,パスワード,パスワード変更">
@endsection

@section('content')
<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">PASSWORD EDIT</h2>
        <h3 class="l-page-title__sub-title">パスワード変更</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">

                <form class="c-form" action="{{ route('password.edit') }}" method="post" >
                    @csrf
                    <div class="c-form__input-area">
                        <label for="user-name" class="c-form__label">古いパスワード</label>
                        <input type="password" class="c-form__input" name="password_old" value="{{ old('password_old') }}">
                        @if($errors->any())
                            @foreach($errors->get('password_old') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                        <p class="c-form__err-msg">{{ session('db_pass_check') }}</p>
                    </div>

                    <div class="c-form__input-area">
                        <label for="user-name" class="c-form__label">新しいパスワード</label>
                        <input type="password" class="c-form__input" name="password" value="{{ old('password') }}">
                        @if($errors->any())
                            @foreach($errors->get('password') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>

                    <div class="c-form__input-area">
                        <label for="user-name" class="c-form__label">新しいパスワード(再入力)</label>
                        <input type="password" class="c-form__input" id="password-confirm" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @if($errors->any())
                            @foreach($errors->get('password_confirmation') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>

                    <input type="submit" class="c-btn c-form__submit">

                </form>
            </main>
        </div>
    </div>
</div>
@endsection