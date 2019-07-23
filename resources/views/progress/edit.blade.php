@extends('layout')

@section('page-title')
    <title>進捗更新 | STEP</title>
    <meta name="description" content="進捗更新ページです。学習時間を記録することで自動的に進捗率が更新されます。合わせて、気付いたことや学んだことをメモすることが可能です。">
    <meta name="keywords" content="努力,目標,達成,順序,学習,進捗,進捗更新">
@endsection

@section('content')
    <div class="l-home">
        <div class="l-page-title">
            <h2 class="l-page-title__title">UPDATE PROGRESS</h2>
            <h3 class="l-page-title__sub-title">進捗更新</h3>
        </div>
        <div class="c-container">
            <div class="l-main-wrap">
                <main class="l-main l-main--2column">
                    <div class="c-detail-step">
                        <div class="c-detail-step__title">{{ $step_detail->getTitle() }}</div>
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

                            @if( !empty($progress) )
                            <div class="c-progress">
                                <div class="c-progress__total-working-time">
                                    <div class="c-progress__total-working-time--title">トータル練習時間：</div>
                                    <div class="c-progress__total-working-time--content">{{ $progress->getTotalWorkingTime() }}時間</div>

                                </div>

                                @if($childstep->getTimeRequired())
                                <div class="c-progress__required-time">
                                    <div class="c-progress__required-time--title">必要時間：</div>
                                    <div class="c-progress__required-time--content">{{$childstep->getTimeRequired()}}時間</div>
                                </div>
                                @endif

                                <div class="c-progress__percentage-achievement">
                                    <div class="c-progress__percentage-achievement--title">進捗率：</div>
                                    <div class="c-progress__percentage-achievement--content">{{ $progress->getPercentageAchievement() }}%</div>
                                    <progress class="c-progress__progress-bar id="file" max="100" value="{{ $progress->getPercentageAchievement() }}"></progress>
                                </div>
                            </div>
                            @endif

                            @if( count($progress->reports) )
                            <div class="c-detail-childstep__report">
                                <div class="c-detail-childstep__report--title">
                                    気付いたこと・学んだこと
                                </div>
                                @foreach ($progress->reports as $key => $report)
                                <div class="c-detail-childstep__report--content">
                                    {{ $report->content }}
                                </div>

                                <div class="c-detail-childstep__report--date">
                                    {{ $report->created_at }}
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>

                    <form class="c-input-progress-form" action="{{ route('progress.update', ['id' => $progress->getId() ]) }}" method="post">
                    @csrf
                        <div class="c-input-progress-form__title">
                            「作業時間」や「気付いたこと・学んだこと」を記録する
                        </div>
                        <div class="c-input-progress-form__working-time">
                            <div class="c-input-progress-form__working-time__heading">
                                作業時間：
                            </div>
                            <input type="number" step="1" min="1" max="255" class="inpput-progress-form__working-time__input-area" name="working_time" id="working_time">時間


                        </div>
                        @if($errors->any())
                            @foreach($errors->get('working_time') as $message)
                                <p class="c-form__err-msg u-margin__error-message-edit-progress u-margin-bottom__error-message-edit-progress">{{$message}}</p>
                            @endforeach
                        @endif

                        <div class="c-input-progress-form__report">
                            <div class="c-input-progress-form__report__heading">
                                気付いたこと・学んだこと
                            </div>
                            <textarea class="c-input-progress-form__report__input-area u-margin-bottom__report-textarea" name="report" id="report" cols="30" rows="10"></textarea>
                        @if($errors->any())
                            @foreach($errors->get('report') as $message)
                            <p class="c-form__err-msg u-margin__error-message-edit-progress u-margin-bottom__error-message-edit-progress">{{$message}}</p>
                            @endforeach
                        @endif

                        </div>
                        <input type="submit" class="c-btn c-form__submit c-input-progress-form__submit" value="進捗を更新">
                    </form>
                </main>
                @include('partials.sidebar')
            </div>
        </div>
    </div>
@endsection
