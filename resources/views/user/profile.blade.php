@extends('layout')

@section('page-title')
    <title>プロフィール編集ページ | STEP</title>
    <meta name="description" content="プロフィール編集ページです。編集したいプロフィール情報を入力してください。">
    <meta name="keywords" content="努力,目標,達成,順序,学習,プロフィール,プロフィール編集">
@endsection

@section('content')
<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">PROFILE EDIT</h2>
        <h3 class="l-page-title__sub-title">プロフィール変更</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">

                <form class="c-form" action="{{ route('profile.edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="c-form__input-area">
                        <label for="email" class="c-form__label">emailアドレス</label>
                        <input type="text" class="c-form__input" name="email" id="email" value="{{old('email', Auth::user()->email)}}">
                        @if($errors->any())
                            @foreach($errors->get('email') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>

                    <div class="c-form__input-area">
                        <label for="user-name" class="c-form__label">ユーザネーム(他人に公開されます)</label>
                        <input type="text" class="c-form__input" name="name" id="name" value="{{old('name', Auth::user()->name)}}">
                        @if($errors->any())
                            @foreach($errors->get('name') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>

                    <div class="c-form__input-area">
                        <label for="user-name" class="c-form__label">自己紹介文</label>
                        <textarea name="profile" id="profile" cols="30" rows="10"  class="c-form__input c-form__textarea">{{old('profile', Auth::user()->profile)}}</textarea>
                        @if($errors->any())
                            @foreach($errors->get('profile') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>

                    <div class="c-form__input-area" style="overflow:hidden;">
                        <label for="user-name" class="c-form__label">プロフィール画像</label>
                        <label for="file-input" class="c-form__area-drop js-area-drop" >画像をドラッグ＆ドロップ
                            <img src="/storage/{{old('pic_icon', Auth::user()->pic_icon)}}" alt="" class="c-form__prev-img prev-img">
                            <input type="file" name="pic_icon" id="pic_icon" class="c-form__file-input js-input-file">
                        </label>
                        @if($errors->any())
                            @foreach($errors->get('pic_icon') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif
                    </div>

                    <input type="submit" class="c-btn c-form__submit" value="プロフィールを変更する">

                </form>
            </main>
        </div>
    </div>
</div>
@endsection