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
                    <p class="l-main__text">ご指定のメールアドレスお送りした【パスワード再発行認証メール】内にある「認証キー」をご入力ください。</p>

                    <form class="c-form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}" />
                        <div class="c-form__input-area">
                            <label for="user-name" class="c-form__label">emailアドレス</label>
                            <input type="text" class="c-form__input" name="email" id="email" />
                            @if($errors->any())
                                @foreach($errors->get('email') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                        </div>

                        <div class="c-form__input-area">

                            <label for="user-name" class="c-form__label">新しいパスワード</label>
                            <input type="password" class="c-form__input" name="password" id="password" />
                            @if($errors->any())
                                @foreach($errors->get('password') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                        </div>

                        <div class="c-form__input-area">

                            <label for="user-name" class="c-form__label">新しいパスワード(再入力)</label>
                            <input type="password" class="c-form__input" id="password-confirm" name="password_confirmation" />
                            @if($errors->any())
                                @foreach($errors->get('password_re') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                            @if($errors->any())
                                @foreach($errors->get('password-confirm') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                            @if($errors->any())
                                @foreach($errors->get('password_confirmation') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif

                        </div>




                        <input type="submit" class="c-btn c-form__submit">

                        <div class="c-form__sub-msg c-form__sub-msg--position-left"><a href="" class="c-form__link">&#171;パスワード再発行メールを再度送信する</a></div>
                    </form>



                </main>



            </div>
        </div>

    </div>

    </div>
@endsection

