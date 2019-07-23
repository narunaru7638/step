@extends('layout')

@section('page-title')
    <title>STEP情報変更 | STEP</title>
    <meta name="description" content="STEP情報変更ページです。STEPおよび各子STEPの内容のみ変更可能です。">
    <meta name="keywords" content="努力,目標,達成,順序,学習,情報変更,変更">
@endsection

@section('content')
    <div class="l-home">

        <div class="l-page-title">
            <h2 class="l-page-title__title">STEP INFORMATION CHANGE</h2>
            <h3 class="l-page-title__sub-title">ステップ情報変更</h3>
        </div>

        <div class="c-container">
            <div class="l-main-wrap">
                <main class="l-main l-main--2column">
                    <div class="l-main__text l-main__text--margin-left l-main__font-empha">STEPおよび各子STEPの内容のみ編集可能です</div>

                    <div class="c-detail-step">
                        <form class="" action="{{ route('steps.edit', ['id' => $step_detail->getId()] ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="c-detail-step__title">{{ $step_detail->getTitle() }}</div>
                            <div class="c-detail-step__info">
                                <div class="c-detail-step__info--left">
                                    <a href="{{ route('steps.index', ['id' => $step_detail->getCategoryId()]) }}"><div class="c-detail-step__category">{{ $step_detail->getCategoryName() }}</div></a>
                                    <div class="c-detail-step__date">{{ $step_detail->getCreatedAt() }}</div>
                                    <a href="{{ route('profile.show', ['id' => $step_detail->getUserId()]) }}"><div class="c-detail-step__username">{{ $step_detail->getUserName() }}</div></a>
                                    <div class="c-detail-step__required-time">{{ $step_detail->getRequiredTime() }}</div>
                                </div>
                                <div class="c-detail-step__info--right">
                                    <div class="c-detail-step__number-of-challenger">チャレンジした人：{{ $step_detail->getNumberOfChallenger() }}人</div>
                                    @if( Auth::check())
                                        @if( $challenge_exists_flg && $challenge->delete_flg === 0 && $challenge->complete_flg === 1)
                                            <div class="c-detail-step__challenge-flg">達成済</div>
                                        @elseif( $challenge_exists_flg && $challenge->delete_flg === 0)
                                            <div class="c-detail-step__challenge-flg">挑戦中</div>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <img src="/storage/{{ $step_detail->getPicImg() }}" alt="" class="c-detail-step__img">
                            <div class="c-form__input-area c-form__input-area--for-update">
                                <label for="step_content" class="c-form__label">STEP説明</label>
                                <textarea cols="30" rows="10" name="step_content" id="step_content" class="c-form__input c-form__textarea">{{old('step_content', $step_detail->getContent())}}</textarea>
                                @if($errors->any())
                                    @foreach($errors->get('step_content') as $message)
                                        <p class="c-form__err-msg">{{$message}}</p>
                                    @endforeach
                                @endif
                            </div>


                            @foreach ($step_detail->childsteps as $key => $childstep)
                                    <div class="c-detail-childstep">
                                        <div class="c-detail-childstep__title">STEP{{ $childstep->getNumberOfStep() }}:{{ $childstep->getTitle() }}</div>

                                        <div class="c-detail-childstep__body">
                                            <img src="/storage/{{ $childstep->getPicImg() }}" alt="" class="c-detail-childstep__img">

                                            <div class="c-detail-childstep__content">
                                                <div class="c-detail-childstep__info">
                                                        <div class="c-detail-childstep__info--left">
                                                            <div class="c-detail-childstep__required-time">所要時間：{{ $childstep->getTimeRequired() }}時間</div>
                                                        </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="c-form__input-area">
                                            <label for="childstep{{$key+1}}_content" class="c-form__label">STEP{{$key+1}}説明</label>
                                            <textarea name="childstep{{$key+1}}_content" id="childstep{{$key+1}}_content" cols="30" rows="10"  class="c-form__input c-form__textarea c-form__textarea--childstep">{{ old('childstep'.($key+1).'_content', $childstep->getContent() )}}</textarea>
                                            @if($errors->any())
                                                @foreach($errors->get('childstep'.($key+1).'_content') as $message)
                                                    <p class="c-form__err-msg">{{$message}}</p>
                                                @endforeach
                                            @endif
                                        </div>



                                    </div>
                            @endforeach

                            <input type="number" step="1" min="{{$number_of_childstep}}" max="{{$number_of_childstep}}" name="number_of_childstep" id="number_of_childstep" value="{{$number_of_childstep}}" hidden />

                        @if($errors->any())
                            @foreach($errors->get('number_of_childstep') as $message)
                            <p class="c-form__err-msg">{{$message}}</p>
                            @endforeach
                        @endif

                            <input type="submit" class="c-btn c-form__submit c-form__submit--width c-form__submit--edit-step" value="このSTEPの内容を編集する">
                        </form>

                    </div>
                </main>

                @include('partials.sidebar')

            </div>
        </div>
    </div>
@endsection
