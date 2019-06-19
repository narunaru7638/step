@extends('layout')

@section('page-title')
    <title>パスワード再発行 | STEP</title>
@endsection


@section('content')
    <div class="l-home">

        <div class="l-page-title">
            <h2 class="l-page-title__title">PASSWORD RESET</h2>
            <h3 class="l-page-title__sub-title">パスワード再発行</h3>
        </div>

        <div class="c-container">
            <div class="l-main-wrap">
                <main class="l-main l-main--1column">
                    <p class="l-main__text">ご指定のメールアドレス宛にパスワード再発行用のURLと認証キーをお送り致します。メールアドレスを入力して下さい。</p>

                    @if (session('status'))
                        <div role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="c-form" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="c-form__input-area">
                            <label for="email" class="c-form__label">emailアドレス</label>
                            <input type="text" class="c-form__input" name="email" id="email">
{{--                            <p class="c-form__err-msg">入力されていません</p>--}}
                        </div>


                        <input type="submit" class="c-btn c-form__submit">

                        <div class="c-form__sub-msg c-form__sub-msg--position-left"><a href="{{ route('login') }}" class="c-form__link">&#171;ログイン画面に戻る</a></div>
                    </form>



                </main>



            </div>
        </div>

    </div>

    </div>
@endsection

