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
                            <a class="c-detail-step__icon-link" href="https://twitter.com/intent/tweet?url={{ route('steps.detail', ['id' => $step_detail->getId() ]) }}&text=「{{$step_detail->getTitle()}}」　　STEP 〜あなたの人生のSTEPを共有しよう〜" target="_blank">
                                <i class="fab fa-twitter-square c-detail-step__twitter-icon">
                                </i>
                            </a>
                        </div>
                    </div>

                    <img src="/storage/{{ $step_detail->getPicImg() }}" alt="" class="c-detail-step__img">
                    <div class="c-detail-step__text">{{ $step_detail->getContent() }}</div>

                    @foreach ($step_detail->childsteps as $key => $childstep)

                    <div class="c-detail-childstep">
                        <div class="c-detail-childstep__title">STEP{{ $childstep->getNumberOfStep() }}:{{ $childstep->getTitle() }}</div>

                        <div class="c-detail-childstep__body">
                            <img src="/storage/{{ $childstep->getPicImg() }}" alt="" class="c-detail-childstep__img">

                            <div class="c-detail-childstep__content">
                                <div class="c-detail-childstep__info">
                                    @if($childstep->getTimeRequired())
                                        <div class="c-detail-childstep__info--left">
                                            <div class="c-detail-childstep__required-time">所要時間：{{ $childstep->getTimeRequired() }}時間</div>
                                        </div>
                                    @endif
                                </div>
                                <div class="c-detail-childstep__text">{{ $childstep->getContent() }}</div>
                            </div>


                        </div>

{{--                        @if( !empty($childstep_progress_exists_flg) )--}}
                        @if( !empty($progress) )

                            <div class="c-progress">
                                <div class="c-progress__total-working-time">
                                    <div class="c-progress__total-working-time--title">トータル練習時間：</div>
                                    <div class="c-progress__total-working-time--content">{{ $progress[$key]->getTotalWorkingTime() }}時間</div>

                                </div>

                                @if($childstep->getTimeRequired())
                                <div class="c-progress__required-time">
                                    <div class="c-progress__required-time--title">必要時間：</div>
                                    <div class="c-progress__required-time--content">{{$childstep->getTimeRequired()}}時間</div>
                                </div>
                                @endif


                                <div class="c-progress__percentage-achievement">
                                    <div class="c-progress__percentage-achievement--title">進捗率：</div>
                                    <div class="c-progress__percentage-achievement--content">{{ $progress[$key]->getPercentageAchievement() }}%</div>
                                    <progress class="c-progress__progress-bar id="file" max="100" value="{{ $progress[$key]->getPercentageAchievement() }}"></progress>
                                </div>
                            </div>

{{--                            <input type="number" class="c-childstep-progress__input-today-progress">--}}



{{--                            @if( $progress[$key]->reports !== [] )--}}
{{--                                @if( empty($progress[$key]->reports) )--}}
{{--                                @if( $progress[$key]->reports )--}}

{{--                                {{ count($progress[$key]->reports)  }}--}}
{{--                            {{ is_null(count($progress[$key]->reports))  }}--}}
{{--                            {{ is_null($progress[$key]->reports) }}--}}

                            @if( count($progress[$key]->reports) )



{{--                                {{ gettype($progress[$key]->reports) }}--}}
{{--                            {{$progress[$key]->reports}}--}}
{{--                                {{ empty($progress[$key]->reports) }}--}}


                                <div class="c-detail-childstep__report">
                                    <div class="c-detail-childstep__report--title">
                                        気付いたこと・学んだこと
                                    </div>

                                    @foreach ($progress[$key]->reports as $key => $report)
                                        <div class="c-detail-childstep__report--content">
                                            {{ $report->content }}
                                        </div>

                                        <div class="c-detail-childstep__report--date">
                                            {{ $report->created_at }}
                                        </div>
                                    @endforeach

                                </div>
                            @endif


                                @if( $progress[$key]->input_possible_flg === 1)

                                    <a href="{{ route('progress.edit', ['id' => $progress[$key]->getId() ] )}}"><div class="c-btn c-detail-childstep__edit-progress-btn">進捗を編集する</div></a>
                                @endif



                        @endif

                    </div>
                    @endforeach

                    @if( Auth::check())
                        <form class="c-form" action="{{ route('steps.detail', ['id' => $step_detail->getId() ]) }}" method="post">
                            @csrf
                            @if( $challenge_exists_flg && $challenge->delete_flg === 0 && $challenge->complete_flg === 1)
                            @elseif( $challenge_exists_flg && $challenge->delete_flg === 0)
                                <input type="submit" class="c-btn c-btn--warning c-form__submit" value="このSTEPのチャレンジをやめる">
                            @else
                                <input type="submit" class="c-btn c-form__submit" value="このSTEPにチャレンジする">
                            @endif
                        </form>
                    @else
                        <form class="c-form" action="{{ route('steps.detail', ['id' => $step_detail->getId() ]) }}" method="post">
                        @csrf
                            <input type="submit" class="c-btn c-form__submit c-form__submit--width" value="ログインしてこのSTEPにチャレンジ">
                        </form>
                    @endif

                </div>
            </main>

            @include('partials.sidebar')

        </div>
    </div>
</div>
@endsection
