@extends('layout')

@section('page-title')
    <title>STEP詳細 | STEP</title>
    <meta name="description" content="{{$step_detail->getTitle()}} {{$step_detail->getContent()}}">
    <meta name="keywords" content="努力,目標,達成,順序,学習,詳細">

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
                    @if(Auth::check())
                        @if($step_detail->user_id === Auth::user()->id)
                    {{-- ログインしているかつログインしているユーザのIDとSTEPのユーザIDが同じ時 --}}
                    <div class="c-detail-step__link--position-right"><a class="c-detail-step__link" href="{{ route('steps.edit', ['id' => $step_detail->getId()]) }}">&#187;登録したSTEPの内容を変更する</a></div>
                        @endif
                    @endif
                    <div class="c-detail-step__info">
                        <div class="c-detail-step__info--left">
                            <a href="{{ route('steps.category.index', ['id' => $step_detail->getCategoryId()]) }}"><div class="c-detail-step__category">{{ $step_detail->getCategoryName() }}</div></a>
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

                    @if( !empty($progress) && $progress[$key]->input_possible_flg === 1 && $challenge_exists_flg && $challenge->delete_flg === 0)
                        {{-- 進捗情報があってかつ進捗を入力可能なとき --}}
                        <a href="{{ route('progress.edit', ['id' => $progress[$key]->getId() ] )}}"><div class="c-detail-childstep__title">子STEP{{ $childstep->getNumberOfStep() }}:{{ $childstep->getTitle() }}</div></a>
                    @else
                        <div class="c-detail-childstep__title">STEP{{ $childstep->getNumberOfStep() }}:{{ $childstep->getTitle() }}</div>
                    @endif

                        <div class="c-detail-childstep__body">
                        @if( !empty($progress) && $progress[$key]->input_possible_flg === 1 && $challenge_exists_flg && $challenge->delete_flg === 0)
                            {{-- 進捗情報があってかつ進捗を入力可能なとき --}}
                            <a class="c-detail-childstep__img" href="{{ route('progress.edit', ['id' => $progress[$key]->getId() ] )}}"><img src="/storage/{{ $childstep->getPicImg() }}" alt="" ></a>
                        @else
                            <img src="/storage/{{ $childstep->getPicImg() }}" alt="" class="c-detail-childstep__img">
                        @endif

                            <div class="c-detail-childstep__content">
                                <div class="c-detail-childstep__info">
                                        <div class="c-detail-childstep__info--left">
                                            <div class="c-detail-childstep__required-time">所要時間：{{ $childstep->getTimeRequired() }}時間</div>
                                        @if( !empty($progress) && $progress[$key]->complete_flg && $challenge_exists_flg && $challenge->delete_flg === 0)
                                            <div class="c-detail-childstep__challenge-flg">達成済</div>
                                        @endif
                                        </div>
                                </div>
                            @if( !empty($progress) && $progress[$key]->input_possible_flg === 1 && $challenge_exists_flg && $challenge->delete_flg === 0)
                                {{-- 進捗情報があってかつ進捗を入力可能なとき --}}
                                <a href="{{ route('progress.edit', ['id' => $progress[$key]->getId() ] )}}"><div class="c-detail-childstep__text">{{ $childstep->getContent() }}</div></a>
                            @else
                                <div class="c-detail-childstep__text">{{ $childstep->getContent() }}</div>
                            @endif
                            </div>
                        </div>

                @if( !empty($progress) && $challenge_exists_flg && $challenge->delete_flg === 0)
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

                    @if( count($progress[$key]->reports) && $challenge_exists_flg && $challenge->delete_flg === 0)
                        <div class="c-detail-childstep__report">
                            <div class="c-detail-childstep__report--title">
                                気付いたこと・学んだこと
                            </div>
{{--                        @foreach ($progress[$key]->reports as $key => $report)--}}
                        @foreach ($progress[$key]->reports as $report)

                                <div class="c-detail-childstep__report--content">
                                {{ $report->content }}
                            </div>

                            <div class="c-detail-childstep__report--date">
                                {{ $report->created_at }}
                            </div>
                        @endforeach
                        </div>
                    @endif

                    @if( $progress[$key]->input_possible_flg === 1 && $challenge_exists_flg && $challenge->delete_flg === 0)
                        <a href="{{ route('progress.edit', ['id' => $progress[$key]->getId() ] )}}"><div class="c-btn c-detail-childstep__edit-progress-btn">進捗を更新する</div></a>
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
