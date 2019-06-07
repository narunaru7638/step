@extends('layout')

@section('page-title')
    <title>STEP登録 | STEP</title>
@endsection

{{--@section('nav')--}}
{{--        <nav class="l-header-container__global-nav">--}}
{{--            <ul class="l-nav">--}}
{{--                <li class="l-nav__item"><a class="l-nav__link" href="">マイページ</a></li>--}}
{{--                <li class="l-nav__item"><a class="l-nav__link" href="">ログアウト</a></li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--@endsection--}}

@section('content')
{{--<div class="l-main-wrap">--}}
{{--    <main class="l-main l-main--2column">--}}
{{--        <section class="c-container c-container--2column">--}}
{{--            <h2 class="c-container__title">STEP登録</h2>--}}
{{--            <div class="c-container__body">--}}

{{--                <form class="c-form c-form__2column" action="{{ route('steps.create') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <label for="step-title" class="c-form__label">STEP名--}}
{{--                        <input type="text" class="c-form__input" id="step-title" name="step_title" value="{{ old('step_title') }}" />--}}

{{--                        @if($errors->any())--}}

{{--                            @foreach($errors->get('step_title') as $message)--}}
{{--                                <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                            @endforeach--}}


{{--                        @endif--}}

{{--                    </label>--}}


{{--                    <label for="step-category_id" class="c-form__label">カテゴリー--}}
{{--                        <select class="c-form__input" id="step-category_id" name="step_category_id">--}}
{{--                            <option value="1">未入力</option>--}}
{{--                            <option value="2">プログラミング</option>--}}
{{--                            <option value="3">ダイエット</option>--}}
{{--                            <option value="4">英語</option>--}}
{{--                            <option value="5">資格</option>--}}
{{--                        </select>--}}
{{--                        <p class="c-form__err-msg">入力されていません</p>--}}
{{--                    </label>--}}


{{--                    <label for="step-content" class="c-form__label">詳細--}}
{{--                        <textarea name="step_content" id="step-content" cols="30" rows="10"  class="c-form__input c-form__textarea">{{ old('step_content') }}</textarea>--}}
{{--                        @if($errors->any())--}}
{{--                            @foreach($errors->get('step_content') as $message)--}}
{{--                                <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                            @endforeach--}}

{{--                        @endif--}}

{{--                    </label>--}}

{{--                    <div class="p-input-child-steps-area">--}}
{{--                        <div class="p-input-one-child-step">--}}
{{--                            <p class="p-input-one-child-step__title">STEP1</p>--}}
{{--                            <input name="childstep_title_1" type="text" class="p-input-one-child-step__input" value="{{ old('childstep_title_1') }}">--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_title_1') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                            <p class="p-input-one-child-step__detail">詳細</p>--}}
{{--                            <textarea name="childstep_content_1" id="" cols="30" rows="10"  class="p-input-one-child-step__textarea">{{ old('childstep_content_1') }}</textarea>--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_content_1') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                        <div class="p-input-one-child-step">--}}
{{--                            <p class="p-input-one-child-step__title">STEP2</p>--}}
{{--                            <input name="childstep_title_2" type="text" class="p-input-one-child-step__input" value="{{ old('childstep_title_2') }}">--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_title_2') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                            <p class="p-input-one-child-step__detail">詳細</p>--}}
{{--                            <textarea name="childstep_content_2" id="" cols="30" rows="10"  class="p-input-one-child-step__textarea">{{ old('childstep_content_2') }}</textarea>--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_content_2') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                        <div class="p-input-one-child-step">--}}
{{--                            <p class="p-input-one-child-step__title">STEP3</p>--}}
{{--                            <input name="childstep_title_3" type="text" class="p-input-one-child-step__input" value="{{ old('childstep_title_3') }}">--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_title_3') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                            <p class="p-input-one-child-step__detail">詳細</p>--}}
{{--                            <textarea name="childstep_content_3" id="" cols="30" rows="10"  class="p-input-one-child-step__textarea">{{ old('childstep_content_3') }}</textarea>--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_content_3') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}



{{--                    <input type="submit" class="c-btn c-form__submit">--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </section>--}}



{{--    </main>--}}

{{--    <div class="l-sidebar">--}}
{{--        <ul class="l-sidebar__list">--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">STEP--}}
{{--                    登録</a></li>--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">プロフィール編集</a></li>--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">パスワード変更</a></li>--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">退会</a></li>--}}

{{--        </ul>--}}


{{--    </div>--}}
{{--</div>--}}


<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">REGIST STEP</h2>
        <h3 class="l-page-title__sub-title">ステップ登録</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">

                <form class="c-form action="{{ route('steps.create') }}" method="post" encrypt="multipart/form-data">
                    @csrf
                    <div class="c-form__input-area">
                        <label for="step_title" class="c-form__label">STEP名</label>
                        <input type="text" class="c-form__input" name="step_title" id="step_title" value="{{ old('step_title') }}">
                        @if($errors->any())
                            @foreach($errors->get('step_title') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif


                    </div>

                    <div class="c-form__input-area">
                        <label for="step_content" class="c-form__label">STEP説明</label>
                        <textarea cols="30" rows="10" name="step_content" id="step_content" class="c-form__input c-form__textarea">{{ old('step_content') }}</textarea>
                        @if($errors->any())
                            @foreach($errors->get('step_content') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif

                    </div>

                    <div class="c-form__input-area">
                        <label for="step_img" class="c-form__label">プロフィール画像</label>
                        <label for="step_img" class="c-form__area-drop" >自己紹介文
                            <img src="/img/programming.jpg" alt="" class="c-form__prev-img">
                            <input type="file" name="prof-pic" class="c-form__file-input" name="step_img" id="step_img">
                        </label>
                        @if($errors->any())

                            @foreach($errors->get('step_img') as $message)
                                <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach


                        @endif

                    </div>

                    <div class="c-form__row-input-area">
                        <div class="c-form__input-area">
                            <label for="step_category" class="c-form__label">カテゴリー</label>
                            <select class="c-form__input" name="step_category" id="step_category">
                                <option value="1">未入力</option>
                                <option value="2">プログラミング</option>
                                <option value="3">ダイエット</option>
                                <option value="4">英語</option>
                                <option value="5">資格</option>
                            </select>
                            @if($errors->any())

                                @foreach($errors->get('step_category') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach


                            @endif

                        </div>
                        <div class="c-form__input-area">
                            <label for="step_required-time" class="c-form__label">所要時間</label>
                            <input type="number" step="1" class="c-form__input" name="step_required-time" id="step_required-time">
                            @if($errors->any())
                                @foreach($errors->get('step_required-time') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="c-form__childstep-area">
                        <div class="c-form__childstep-form">
                            <h4 class="c-form__sub-title">STEP1</h4>
                            <div class="c-form__input-area">
                                <label for="childstep1_title" class="c-form__label">STEP名</label>
                                <input type="text" class="c-form__input" name="childstep1_title" id="childstep1_title" value="{{ old('childstep1_title') }}">
                                @if($errors->any())
                                    @foreach($errors->get('childstep1_title') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif

                            </div>

                            <div class="c-form__input-area">
                                <label for="childstep1_content" class="c-form__label">STEP説明</label>
                                <textarea name="childstep1_content" id="childstep1_content" cols="30" rows="10"  class="c-form__input c-form__textarea c-form__textarea--childstep"></textarea>
                                @if($errors->any())
                                    @foreach($errors->get('childstep1_content') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif

                            </div>

                            <div class="c-form__input-area">
                                <label for="childstep1_img" class="c-form__label">プロフィール画像</label>
                                <label for="childstep1_img" class="c-form__area-drop c-form__area-drop--childstep" >自己紹介文
                                    <img src="/img/programming.jpg" alt="" class="c-form__prev-img c-form__prev-img--childstep">
                                    <input type="file" name="prof-pic" class="c-form__file-input c-form__file-input--childstep" id="childstep1_img" name="childstep1_img" >
                                </label>
                                @if($errors->any())
                                    @foreach($errors->get('childstep1_img') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif


                            </div>

                            <div class="c-form__input-area">
                                <label for="childstep1_required-time" class="c-form__label">所要時間</label>
                                <input type="number" step="1" class="c-form__input" name="childstep1_required-time" id="childstep1_required-time">
                                @if($errors->any())
                                    @foreach($errors->get('childstep1_required-time') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif

                            </div>

                        </div>
                        <div class="c-form__childstep-area">
                            <div class="c-form__childstep-form">
                                <h4 class="c-form__sub-title">STEP2</h4>
                                <div class="c-form__input-area">
                                    <label for="childstep2_title" class="c-form__label">STEP名</label>
                                    <input type="text" class="c-form__input" name="childstep2_title" id="childstep2_title">
                                    @if($errors->any())
                                        @foreach($errors->get('childstep2_title') as $message)
                                            <p class="c-form__err-msg">{{$message}}</p>
                                        @endforeach
                                    @endif

                                </div>

                                <div class="c-form__input-area">
                                    <label for="childstep2_content" class="c-form__label">STEP説明</label>
                                    <textarea name="childstep2_content" id="childstep2_content" cols="30" rows="10"  class="c-form__input c-form__textarea c-form__textarea--childstep"></textarea>

                                    @if($errors->any())
                                        @foreach($errors->get('childstep2_content') as $message)
                                            <p class="c-form__err-msg">{{$message}}</p>
                                        @endforeach
                                    @endif

                                </div>

                                <div class="c-form__input-area">
                                    <label for="childstep2_img" class="c-form__label">プロフィール画像</label>
                                    <label for="childstep2_img" class="c-form__area-drop c-form__area-drop--childstep" >自己紹介文
                                        <img src="/img/programming.jpg" alt="" class="c-form__prev-img c-form__prev-img--childstep">
                                        <input type="file" name="prof-pic" class="c-form__file-input c-form__file-input--childstep" id="childstep2_img" name="childstep2_img" >
                                    </label>

                                    @if($errors->any())
                                        @foreach($errors->get('childstep2_img') as $message)
                                            <p class="c-form__err-msg">{{$message}}</p>
                                        @endforeach
                                    @endif


                                </div>

                                <div class="c-form__input-area">
                                    <label for="childstep2_required-time" class="c-form__label">所要時間</label>
                                    <input type="number" step="1" class="c-form__input" name="childstep2_required-time" id="childstep2_required-time">
                                    @if($errors->any())
                                        @foreach($errors->get('childstep2_required-time') as $message)
                                            <p class="c-form__err-msg">{{$message}}</p>
                                        @endforeach
                                    @endif

                                </div>

                            </div>
                            <div class="c-form__childstep-area">
                                <div class="c-form__childstep-form">
                                    <h4 class="c-form__sub-title">STEP3</h4>
                                    <div class="c-form__input-area">
                                        <label for="childstep3_title" class="c-form__label">STEP名</label>
                                        <input type="text" class="c-form__input" name="childstep3_title" id="childstep3_title">
                                        @if($errors->any())
                                            @foreach($errors->get('childstep3_title') as $message)
                                                <p class="c-form__err-msg">{{$message}}</p>
                                            @endforeach
                                        @endif

                                    </div>

                                    <div class="c-form__input-area">
                                        <label for="childstep3_content" class="c-form__label">STEP説明</label>
                                        <textarea name="childstep3_content" id="childstep3_content" cols="30" rows="10"  class="c-form__input c-form__textarea c-form__textarea--childstep"></textarea>

                                        @if($errors->any())
                                            @foreach($errors->get('childstep3_content') as $message)
                                                <p class="c-form__err-msg">{{$message}}</p>
                                            @endforeach
                                        @endif

                                    </div>

                                    <div class="c-form__input-area">
                                        <label for="childstep3_img" class="c-form__label">プロフィール画像</label>
                                        <label for="childstep3_img" class="c-form__area-drop c-form__area-drop--childstep" >自己紹介文
                                            <img src="/img/programming.jpg" alt="" class="c-form__prev-img c-form__prev-img--childstep">
                                            <input type="file" name="prof-pic" class="c-form__file-input c-form__file-input--childstep" id="childstep3_img" name="childstep3_img" >
                                        </label>

                                        @if($errors->any())
                                            @foreach($errors->get('childstep3_img') as $message)
                                                <p class="c-form__err-msg">{{$message}}</p>
                                            @endforeach
                                        @endif


                                    </div>

                                    <div class="c-form__input-area">
                                        <label for="childstep3_required-time" class="c-form__label">所要時間</label>
                                        <input type="number" step="1" class="c-form__input" name="childstep3_required-time" id="childstep3_required-time">
                                        @if($errors->any())
                                            @foreach($errors->get('childstep3_required-time') as $message)
                                                <p class="c-form__err-msg">{{$message}}</p>
                                            @endforeach
                                        @endif

                                    </div>

                                </div>


                    </div>





                    <input type="submit" class="c-btn c-form__submit">
                </form>



            </main>



        </div>
    </div>

</div>


@endsection


{{--<!DOCTYPE html>--}}
{{--<html lang="ja">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>STEP登録 | STEP</title>--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">--}}

{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">--}}
{{--    <link type="text/css" rel="stylesheet" href="/css/style.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<header class="l-header">--}}
{{--    <div class="l-header-container">--}}
{{--        <h1 class="l-header-container__site-logo">Step</h1>--}}
{{--        <div class="c-menu-hamburger js-toggle-sp-menu">--}}
{{--            <span class="c-menu-hamburger__line js-toggle-sp-menu-target"></span>--}}
{{--            <span class="c-menu-hamburger__line js-toggle-sp-menu-target"></span>--}}
{{--            <span class="c-menu-hamburger__line js-toggle-sp-menu-target"></span>--}}
{{--        </div>--}}

{{--        <nav class="l-header-container__global-nav">--}}
{{--            <ul class="l-nav">--}}
{{--                <li class="l-nav__item"><a class="l-nav__link" href="">マイページ</a></li>--}}
{{--                <li class="l-nav__item"><a class="l-nav__link" href="">ログアウト</a></li>--}}

{{--            </ul>--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--</header>--}}
{{--<div class="l-main-wrap">--}}
{{--    <main class="l-main l-main--2column">--}}
{{--        <section class="c-container c-container--2column">--}}
{{--            <h2 class="c-container__title">STEP登録</h2>--}}
{{--            <div class="c-container__body">--}}

{{--                <form class="c-form c-form__2column" action="{{ route('steps.create') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <label for="step-title" class="c-form__label">STEP名--}}
{{--                        <input type="text" class="c-form__input" id="step-title" name="step_title" value="{{ old('step_title') }}" />--}}

{{--                        @if($errors->any())--}}
{{--                            {{ $errors }}--}}
{{--                            {{ dump( $errors ) }}--}}

{{--                            {{ dump( $errors->all()["step_title"] ) }}--}}
{{--                            {{ dump( $errors['step_title'] ) }}--}}
{{--                            {{ dump( $errors->all() ) }}--}}


{{--                            @foreach($errors->get('step_title') as $message)--}}
{{--                                <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                            @endforeach--}}


{{--                        @endif--}}

{{--                    </label>--}}


{{--                    <label for="step-category_id" class="c-form__label">カテゴリー--}}
{{--                        <select class="c-form__input" id="step-category_id" name="step_category_id">--}}
{{--                            <option value="1">未入力</option>--}}
{{--                            <option value="2">プログラミング</option>--}}
{{--                            <option value="3">ダイエット</option>--}}
{{--                            <option value="4">英語</option>--}}
{{--                            <option value="5">資格</option>--}}
{{--                        </select>--}}
{{--                        <p class="c-form__err-msg">入力されていません</p>--}}
{{--                    </label>--}}


{{--                    <label for="step-content" class="c-form__label">詳細--}}
{{--                        <textarea name="step_content" id="step-content" cols="30" rows="10"  class="c-form__input c-form__textarea">{{ old('step_content') }}</textarea>--}}
{{--                        @if($errors->any())--}}
{{--                            @foreach($errors->get('step_content') as $message)--}}
{{--                                <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                            @endforeach--}}

{{--                        @endif--}}

{{--                    </label>--}}

{{--                    <div class="p-input-child-steps-area">--}}
{{--                        <div class="p-input-one-child-step">--}}
{{--                            <p class="p-input-one-child-step__title">STEP1</p>--}}
{{--                            <input name="childstep_title_1" type="text" class="p-input-one-child-step__input" value="{{ old('childstep_title_1') }}">--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_title_1') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                            <p class="p-input-one-child-step__detail">詳細</p>--}}
{{--                            <textarea name="childstep_content_1" id="" cols="30" rows="10"  class="p-input-one-child-step__textarea">{{ old('childstep_content_1') }}</textarea>--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_content_1') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                        <div class="p-input-one-child-step">--}}
{{--                            <p class="p-input-one-child-step__title">STEP2</p>--}}
{{--                            <input name="childstep_title_2" type="text" class="p-input-one-child-step__input" value="{{ old('childstep_title_2') }}">--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_title_2') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                            <p class="p-input-one-child-step__detail">詳細</p>--}}
{{--                            <textarea name="childstep_content_2" id="" cols="30" rows="10"  class="p-input-one-child-step__textarea">{{ old('childstep_content_2') }}</textarea>--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_content_2') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                        <div class="p-input-one-child-step">--}}
{{--                            <p class="p-input-one-child-step__title">STEP3</p>--}}
{{--                            <input name="childstep_title_3" type="text" class="p-input-one-child-step__input" value="{{ old('childstep_title_3') }}">--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_title_3') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                            <p class="p-input-one-child-step__detail">詳細</p>--}}
{{--                            <textarea name="childstep_content_3" id="" cols="30" rows="10"  class="p-input-one-child-step__textarea">{{ old('childstep_content_3') }}</textarea>--}}
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->get('childstep_content_3') as $message)--}}
{{--                                    <p class="p-input-one-child-step__err-msg">{{$message}}</p>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}



{{--                    <input type="submit" class="c-btn c-form__submit">--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </section>--}}



{{--    </main>--}}

{{--    <div class="l-sidebar">--}}
{{--        <ul class="l-sidebar__list">--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">STEP--}}
{{--                    登録</a></li>--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">プロフィール編集</a></li>--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">パスワード変更</a></li>--}}
{{--            <li class="l-sidebar__item"><a href="" class="l-sidebar__link">退会</a></li>--}}

{{--        </ul>--}}


{{--    </div>--}}
{{--</div>--}}
{{--<footer id="footer" class="l-footer">--}}
{{--    <p class="l-footer__text">Copyright © <a href="https://twitter.com/narumismis" class="l-footer__link">なる</a>. All Rights Reserved</p>--}}
{{--</footer>--}}
{{--<script   src="https://code.jquery.com/jquery-3.0.0.min.js"   integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="   crossorigin="anonymous"></script>--}}

{{--<script src="js/bundle.js"></script>--}}
{{--</body>--}}
{{--</html>--}}