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
                                <option value="2" @if(old('step_category') == 2 ) selected  @endif>ビジネス</option>
                                <option value="3" @if(old('step_category') == 3 ) selected  @endif>プログラミング</option>
                                <option value="4" @if(old('step_category') == 4 ) selected  @endif>ダイエット</option>
                                <option value="5" @if(old('step_category') == 5 ) selected  @endif>英語</option>
                                <option value="6" @if(old('step_category') == 6 ) selected  @endif>スポーツ</option>
                                <option value="7" @if(old('step_category') == 7 ) selected  @endif>資格</option>
                            </select>
                            @if($errors->any())
                                @foreach($errors->get('step_category') as $message)
                                    <p class="c-form__err-msg">{{$message}}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>

{{--                    <input type="number" step="1" min="1" max="10" name="number_of_childstep" id="number_of_childstep" value="1"/>--}}


{{--                    @foreach(range(1,10) as $step_num)--}}
{{--                    <div class="c-form__childstep-area">--}}
{{--                        <div class="c-form__childstep-form">--}}
{{--                            --}}{{--子STEP1--}}
{{--                            <h4 class="c-form__sub-title">STEP{{$step_num}}</h4>--}}

{{--                            <div class="c-form__input-area">--}}
{{--                                <label for="childstep{{$step_num}}_title" class="c-form__label">STEP{{$step_num}}名</label>--}}
{{--                                <input type="text" class="c-form__input" name="childstep{{$step_num}}_title" id="childstep{{$step_num}}_title" value="{{ old('childstep'.$step_num.'_title') }}">--}}
{{--                                @if($errors->any())--}}
{{--                                    @foreach($errors->get('childstep'.$step_num.'_title') as $message)--}}
{{--                                        <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <div class="c-form__input-area">--}}
{{--                                <label for="childstep{{$step_num}}_content" class="c-form__label">STEP{{$step_num}}説明</label>--}}
{{--                                <textarea name="childstep{{$step_num}}_content" id="childstep{{$step_num}}_content" cols="30" rows="10"  class="c-form__input c-form__textarea c-form__textarea--childstep">{{ old('childstep'.$step_num.'_content') }}</textarea>--}}
{{--                                @if($errors->any())--}}
{{--                                    @foreach($errors->get('childstep'.$step_num.'_content') as $message)--}}
{{--                                        <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <div class="c-form__input-area" style="overflow:hidden;">--}}
{{--                                <label for="childstep{{$step_num}}_img" class="c-form__label">STEP{{$step_num}}イメージ画像</label>--}}
{{--                                <label for="childstep{{$step_num}}_img" class="c-form__area-drop c-form__area-drop--childstep js-area-drop">画像をドラッグ＆ドロップ--}}
{{--                                    <img src="" alt="" class="c-form__prev-img c-form__prev-img--childstep prev-img">--}}
{{--                                    <input type="file" name="childstep{{$step_num}}_img" id="childstep{{$step_num}}_img" class="c-form__file-input c-form__file-input--childstep js-input-file" id="childstep{{$step_num}}_img" name="childstep{{$step_num}}_img" >--}}
{{--                                </label>--}}
{{--                                @if($errors->any())--}}
{{--                                    @foreach($errors->get('childstep'.$step_num.'_img') as $message)--}}
{{--                                        <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <div class="c-form__input-area">--}}
{{--                                <label for="childstep{{$step_num}}_required-time" class="c-form__label">STEP{{$step_num}}所要時間</label>--}}
{{--                                <div class="c-form__required-time-input-area">--}}
{{--                                    <input type="number" step="1" min="1" max="255" class="c-form__input c-form__required-time-input-area--input" name="childstep{{$step_num}}_required-time" id="childstep{{$step_num}}_required-time" value="{{ old('childstep'.$step_num.'_required-time') }}">--}}
{{--                                    <span class="c-form__required-time-input-area--unit">時間</span>--}}
{{--                                </div>--}}
{{--                                @if($errors->any())--}}
{{--                                    @foreach($errors->get('childstep'.$step_num.'_required-time') as $message)--}}
{{--                                        <p class="c-form__err-msg">{{$message}}</p>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}


                <div id="step-create">
                    <v-create-step-form v-for="form in forms" v-bind:form_id="form.id"
                                        @if(old('number_of_childstep'))
                                                v-bind:old_number_of_childstep = {{ old('number_of_childstep') }}
                                                v-bind:count_of_childstep="countOfChildstep"
                                        @else
                                                v-bind:count_of_childstep="countOfChildstep"
                                        @endif


                                        @if(old('childstep1_title')) old_childstep1_title={{ old('childstep1_title') }} @endif
                                        @if(old('childstep1_content')) old_childstep1_content={{ old('childstep1_content') }} @endif
                                        @if(old('childstep1_required-time')) old_childstep1_required_time={{ old('childstep1_required-time') }} @endif

                                        @if(old('childstep2_title')) old_childstep2_title={{ old('childstep2_title') }} @endif
                                        @if(old('childstep2_content')) old_childstep2_content={{ old('childstep2_content') }} @endif
                                        @if(old('childstep2_required-time')) old_childstep2_required_time={{ old('childstep2_required-time') }} @endif

                                        @if(old('childstep3_title')) old_childstep3_title={{ old('childstep3_title') }} @endif
                                        @if(old('childstep3_content')) old_childstep3_content={{ old('childstep3_content') }} @endif
                                        @if(old('childstep3_required-time')) old_childstep3_required_time={{ old('childstep3_required-time') }} @endif

                                        @if(old('childstep4_title')) old_childstep4_title={{ old('childstep4_title') }} @endif
                                        @if(old('childstep4_content')) old_childstep4_content={{ old('childstep4_content') }} @endif
                                        @if(old('childstep4_required-time')) old_childstep4_required_time={{ old('childstep4_required-time') }} @endif

                                        @if(old('childstep5_title')) old_childstep5_title={{ old('childstep5_title') }} @endif
                                        @if(old('childstep5_content')) old_childstep5_content={{ old('childstep5_content') }} @endif
                                        @if(old('childstep5_required-time')) old_childstep5_required_time={{ old('childstep5_required-time') }} @endif

                                        @if(old('childstep6_title')) old_childstep6_title={{ old('childstep6_title') }} @endif
                                        @if(old('childstep6_content')) old_childstep6_content={{ old('childstep6_content') }} @endif
                                        @if(old('childstep6_required-time')) old_childstep6_required_time={{ old('childstep6_required-time') }} @endif

                                        @if(old('childstep7_title')) old_childstep7_title={{ old('childstep7_title') }} @endif
                                        @if(old('childstep7_content')) old_childstep7_content={{ old('childstep7_content') }} @endif
                                        @if(old('childstep7_required-time')) old_childstep7_required_time={{ old('childstep7_required-time') }} @endif

                                        @if(old('childstep8_title')) old_childstep8_title={{ old('childstep8_title') }} @endif
                                        @if(old('childstep8_content')) old_childstep8_content={{ old('childstep8_content') }} @endif
                                        @if(old('childstep8_required-time')) old_childstep8_required_time={{ old('childstep8_required-time') }} @endif

                                        @if(old('childstep9_title')) old_childstep9_title={{ old('childstep9_title') }} @endif
                                        @if(old('childstep9_content')) old_childstep9_content={{ old('childstep9_content') }} @endif
                                        @if(old('childstep9_required-time')) old_childstep9_required_time={{ old('childstep9_required-time') }} @endif

                                        @if(old('childstep10_title')) old_childstep10_title={{ old('childstep10_title') }} @endif
                                        @if(old('childstep10_content')) old_childstep10_content={{ old('childstep10_content') }} @endif
                                        @if(old('childstep10_required-time')) old_childstep10_required_time={{ old('childstep10_required-time') }} @endif


                    ></v-create-step-form>
                    <v-create-step-submit-btn v-on:enadd-step-form="addStepForm"
                                        @if(old('number_of_childstep'))
                                            v-bind:old_number_of_childstep = {{ old('number_of_childstep') }}
                                            v-bind:count_of_childstep="countOfChildstep"
                                        @else
                                                v-bind:count_of_childstep="countOfChildstep"
                                        @endif

                    ></v-create-step-submit-btn>

                </div>

                <input type="submit" class="c-btn c-form__submit">







                </form>



{{--                <div id="step-create">--}}
{{--                    <v-create-step-form></v-create-step-form>--}}
{{--                </div>--}}



            </main>
        </div>
    </div>
</div>
@endsection