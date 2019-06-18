@extends('layout')

@section('page-title')
    <title>STEP詳細 | STEP</title>
@endsection

@section('content')
<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">STEP DETAIL</h2>
        <h3 class="l-page-title__sub-title">ステップ詳細</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--2column">

                <div class="c-detail-step">
                    <div class="c-detail-step__title">{{ $step->getTitle() }}</div>
                    <div class="c-detail-step__info">
                        <div class="c-detail-step__info--left">
                            <a href="{{ route('steps.index', ['id' => $step->getCategoryId()]) }}"><div class="c-detail-step__category">{{ $step->getCategoryName() }}</div></a>
                            <div class="c-detail-step__date">{{ $step->getCreatedAt() }}</div>
                            <a href="{{ route('profile.show', ['id' => $step->getUserId()]) }}"><div class="c-detail-step__username">{{ $step->getUserName() }}</div></a>
                            <div class="c-detail-step__required-time">{{ $step->getRequiredTime() }}</div>
                        </div>
                        <div class="c-detail-step__info--right">
                            <div class="c-detail-step__number-of-challenger">チャレンジした人：{{ $step->getNumberOfChallenger() }}人</div>
                            @if( $challenge_exists_flg && $challenge->delete_flg === 0 && $challenge->complete_flg === 1)
                                <div class="c-detail-step__challenge-flg">達成済</div>
                            @elseif( $challenge_exists_flg && $challenge->delete_flg === 0)
                                <div class="c-detail-step__challenge-flg">挑戦中</div>
                            @endif
                            <a class="c-detail-step__icon-link" href="https://twitter.com/intent/tweet?url={{ route('steps.detail', ['id' => $step->getId() ]) }}&text=「{{$step->getTitle()}}」　　STEP 〜あなたの人生のSTEPを共有しよう〜" target="_blank">
                                <i class="fab fa-twitter-square c-detail-step__twitter-icon">
                                </i>
                            </a>
                        </div>
                    </div>
                    <img src="/storage/{{ $step->getPicImg() }}" alt="" class="c-detail-step__img">
                    <div class="c-detail-step__text">{{ $step->getContent() }}</div>

                    @foreach ($step->childsteps as $key => $childstep)

                    <div class="c-detail-childstep">
                        <div class="c-detail-childstep__title">STEP{{ $childstep->getNumberOfStep() }}:{{ $childstep->getTitle() }}</div>
                        <div class="c-detail-childstep__body">
{{--                            <img src="/storage/{{ $childstep->getPicImg() }}" alt="" class="c-detail-childstep__img">--}}
                            <img src="/storage/{{ $childstep->getPicImg() }}" alt="" class="c-detail-childstep__img">

                            <div class="c-detail-childstep__content">
                                <div class="c-detail-childstep__info">
                                    @if($childstep->getTimeRequired())
                                        <div class="c-detail-childstep__info--left">
                                            <div class="c-detail-childstep__required-time">所要時間：{{ $childstep->getTimeRequired() }}時間</div>
                                        </div>
                                    @endif
{{--                                    <div class="c-detail-childstep__info--right">--}}
{{--                                        <div class="c-detail-childstep__challenge-flg">未挑戦</div>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="c-detail-childstep__text">{{ $childstep->getContent() }}</div>
                            </div>
                        </div>

                        @if( $challenge_exists_flg && $challenge->delete_flg === 0)
                            <form class="c-form c-form--childstep-clear" action="{{ route('childsteps.clear', ['challenge_id' => $challenge->id, 'childstep_id' => $childstep->getId() ]) }}" method="post">
                                @csrf
                                @if( $clear )
                                    @if( $clear[$key]->complete_flg == 0)
                                        <input type="submit" class="c-btn c-btn--childstep-clear" value="STEPクリア">
                                    @else
                                        <input type="submit" class="c-btn c-btn--childstep-clear" value="クリア解除">
                                    @endif
                                @endif
                            </form>
                        @endif

                    </div>
                    @endforeach

                    <form class="c-form" action="{{ route('steps.detail', ['id' => $step->getId() ]) }}" method="post">
                        @csrf
                        @if( $challenge_exists_flg && $challenge->delete_flg === 0 && $challenge->complete_flg === 1)
                        @elseif( $challenge_exists_flg && $challenge->delete_flg === 0)
                            <input type="submit" class="c-btn c-form__submit" value="このSTEPのチャレンジをやめる">
                        @else
                            <input type="submit" class="c-btn c-form__submit" value="このSTEPにチャレンジする">
                        @endif
                    </form>


                </div>


            </main>
            @include('partials.sidebar')


        </div>

    </div>

</div>
@endsection
