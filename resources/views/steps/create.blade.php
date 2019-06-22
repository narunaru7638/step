@extends('layout')

@section('page-title')
    <title>STEP登録 | STEP</title>
@endsection

@section('content')

<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">REGIST STEP</h2>
        <h3 class="l-page-title__sub-title">ステップ登録</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">

                <form class="c-form action="{{ route('steps.create') }}" method="post" enctype="multipart/form-data">
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

                    <div class="c-form__input-area" style="overflow:hidden;">
                        <label for="step_img" class="c-form__label">STEPイメージ画像</label>
                        <label for="step_img" class="c-form__area-drop js-area-drop" >画像をドラッグ＆ドロップ
                            <img src="" alt="" class="c-form__prev-img prev-img">
                            <input type="file" class="c-form__file-input js-input-file" name="step_img" id="step_img" value="{{ old('step_img') }}">
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
                            <select class="c-form__input c-form__input--select" name="step_category" id="step_category" value="{{ old('step_category') }}">
                                <option value="1" @if(old('step_category') == 1 ) selected  @endif>未登録</option>
                                <option value="4" @if(old('step_category') == 4 ) selected  @endif>ビジネス</option>
                                <option value="2" @if(old('step_category') == 2 ) selected  @endif>プログラミング</option>
                                <option value="3" @if(old('step_category') == 3 ) selected  @endif>ダイエット</option>
                                <option value="5" @if(old('step_category') == 5 ) selected  @endif>英語</option>
                                <option value="7" @if(old('step_category') == 7 ) selected  @endif>スポーツ</option>
                                <option value="6" @if(old('step_category') == 6 ) selected  @endif>資格</option>
                            </select>
                            @if($errors->any())
                                @foreach($errors->get('step_category') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="c-form__input-area">
                            <label for="step_required-time" class="c-form__label">所要時間</label>
                            <input type="number" step="1" min="1" max="255" class="c-form__input" name="step_required-time" id="step_required-time" value="{{ old('step_required-time') }}"/>
                            @if($errors->any())
                                @foreach($errors->get('step_required-time') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    @foreach(range(1,3) as $step_num)
                    <div class="c-form__childstep-area">
                        <div class="c-form__childstep-form">
                            {{--子STEP1--}}
                            <h4 class="c-form__sub-title">STEP{{$step_num}}</h4>

                            <div class="c-form__input-area">
                                <label for="childstep{{$step_num}}_title" class="c-form__label">STEP{{$step_num}}名</label>
                                <input type="text" class="c-form__input" name="childstep{{$step_num}}_title" id="childstep{{$step_num}}_title" value="{{ old('childstep'.$step_num.'_title') }}">
                                @if($errors->any())
                                    @foreach($errors->get('childstep'.$step_num.'_title') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif
                            </div>

                            <div class="c-form__input-area">
                                <label for="childstep{{$step_num}}_content" class="c-form__label">STEP{{$step_num}}説明</label>
                                <textarea name="childstep{{$step_num}}_content" id="childstep{{$step_num}}_content" cols="30" rows="10"  class="c-form__input c-form__textarea c-form__textarea--childstep">{{ old('childstep'.$step_num.'_content') }}</textarea>
                                @if($errors->any())
                                    @foreach($errors->get('childstep'.$step_num.'_content') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif
                            </div>

                            <div class="c-form__input-area" style="overflow:hidden;">
                                <label for="childstep{{$step_num}}_img" class="c-form__label">STEP{{$step_num}}イメージ画像</label>
                                <label for="childstep{{$step_num}}_img" class="c-form__area-drop c-form__area-drop--childstep js-area-drop">画像をドラッグ＆ドロップ
                                    <img src="" alt="" class="c-form__prev-img c-form__prev-img--childstep prev-img">
                                    <input type="file" name="childstep{{$step_num}}_img" id="childstep{{$step_num}}_img" class="c-form__file-input c-form__file-input--childstep js-input-file" id="childstep{{$step_num}}_img" name="childstep{{$step_num}}_img" >
                                </label>
                                @if($errors->any())
                                    @foreach($errors->get('childstep'.$step_num.'_img') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif
                            </div>

                            <div class="c-form__input-area">
                                <label for="childstep{{$step_num}}_required-time" class="c-form__label">STEP{{$step_num}}所要時間</label>
                                <input type="number" step="1" min="1" max="255" class="c-form__input" name="childstep{{$step_num}}_required-time" id="childstep{{$step_num}}_required-time" value="{{ old('childstep'.$step_num.'_required-time') }}">
                                @if($errors->any())
                                    @foreach($errors->get('childstep'.$step_num.'_required-time') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <input type="submit" class="c-btn c-form__submit">

                </form>

            </main>
        </div>
    </div>
</div>
@endsection