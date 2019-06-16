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
                            <div class="c-detail-step__category">{{ $step->getCategoryName() }}</div>
                            <div class="c-detail-step__date">{{ $step->getCreatedAt() }}</div>
                            <div class="c-detail-step__username">{{ $step->getUserName() }}</div>
                            <div class="c-detail-step__required-time">{{ $step->getRequiredTime() }}</div>
                        </div>
                        <div class="c-detail-step__info--right">
                            <div class="c-detail-step__number-of-challenger">チャレンジした人：{{ $step->getNumberOfChallenger() }}人</div>
                            <div class="c-detail-step__challenge-flg">挑戦中</div>
                        </div>
                    </div>
                    <img src="img/programming.jpg" alt="" class="c-detail-step__img">
                    <div class="c-detail-step__text">{{ $step->getContent() }}</div>

                    @foreach ($step->childsteps as $childstep)

                    <div class="c-detail-childstep">
                        <div class="c-detail-childstep__title">STEP{{ $childstep->getNumberOfStep() }}:{{ $childstep->getTitle() }}</div>
                        <div class="c-detail-childstep__body">
                            <img src="img/programming.jpg" alt="" class="c-detail-childstep__img">
                            <div class="c-detail-childstep__content">
                                <div class="c-detail-childstep__info">
                                    <div class="c-detail-childstep__info--left">
                                        <div class="c-detail-childstep__required-time">{{ $childstep->getTimeRequired() }}時間</div>
                                    </div>
                                    <div class="c-detail-childstep__info--right">
                                        <div class="c-detail-childstep__challenge-flg">未挑戦</div>
                                    </div>
                                </div>
                                <div class="c-detail-childstep__text">{{ $childstep->getContent() }}</div>
                            </div>

                        </div>
                        <form class="c-form c-form--childstep-clear">
                            <input type="submit" class="c-btn c-btn--childstep-clear" value="このSTEPをやめる">
                        </form>
                    </div>
                    @endforeach

                    <form class="c-form" action="{{ route('steps.detail', ['id' => $step->getId() ]) }}" method="post">
                        @csrf
                            <input type="submit" class="c-btn c-form__submit" value="このSTEPのチャレンジをやめる">
                    </form>




                </div>


            </main>

            <div class="l-sidebar l-sidebar--left">
                <div class="l-sidebar__container">
                    <h2 class="l-sidebar__title">WHATS NEW</h2>
                    <h3 class="l-sidebar__sub-title">最新情報</h3>
                    <div class="l-sidebar__content">
                        <div class="c-article-list c-article-list--small">
                            <icon class="c-article-list__icon c-article-list__icon-small">NEW</icon>
                            <img src="img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
                            <div class="c-article-list__content c-article-list__content--small">
                                <div class="c-article-list__info c-article-list__info--small">
                                    <p class="c-article-list__category c-article-list__category--small">英語</p>
                                    <p class="c-article-list__username c-article-list__username--small">はなこさん</p>
                                    <p class="c-article-list__date c-article-list__date--small">2019/05/03</p>
                                </div>
                                <p class="c-article-list__title c-article-list__title--small">最短で学んだ私の英語学習方法最短で学んだ私の英語学習方法最短で学んだ私の英語学習方法最短で学んだ私の英語学習方法</p>
                            </div>
                        </div>
                        <div class="c-article-list c-article-list--small">
                            <icon class="c-article-list__icon c-article-list__icon-small">NEW</icon>
                            <img src="img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
                            <div class="c-article-list__content c-article-list__content--small">
                                <div class="c-article-list__info c-article-list__info--small">
                                    <p class="c-article-list__category c-article-list__category--small">英語</p>
                                    <p class="c-article-list__username c-article-list__username--small">はなこさん</p>
                                    <p class="c-article-list__date c-article-list__date--small">2019/05/03</p>
                                </div>
                                <p class="c-article-list__title c-article-list__title--small">最短で学んだ私の英語学習方法</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="l-sidebar__container">
                    <h2 class="l-sidebar__title">RANKING</h2>
                    <h3 class="l-sidebar__sub-title">人気のSTEP</h3>
                    <div class="l-sidebar__content">
                        <div class="c-article-list c-article-list--small">
                            <icon class="c-article-list__icon c-article-list__icon--small">1</icon>
                            <img src="img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
                            <div class="c-article-list__content c-article-list__content--small">
                                <div class="c-article-list__info c-article-list__info--small">
                                    <p class="c-article-list__category c-article-list__category--small">英語</p>
                                    <p class="c-article-list__username c-article-list__username--small">はなこさん</p>
                                    <p class="c-article-list__date c-article-list__date--small">2019/05/03</p>
                                </div>
                                <p class="c-article-list__title c-article-list__title--small">最短で学んだ私の英語学習方法</p>
                            </div>
                        </div>
                        <div class="c-article-list c-article-list--small">
                            <icon class="c-article-list__icon c-article-list__icon--small">2</icon>
                            <img src="img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
                            <div class="c-article-list__content c-article-list__content--small">
                                <div class="c-article-list__info c-article-list__info--small">
                                    <p class="c-article-list__category c-article-list__category--small">英語</p>
                                    <p class="c-article-list__username c-article-list__username--small">はなこさん</p>
                                    <p class="c-article-list__date c-article-list__date--small">2019/05/03</p>
                                </div>
                                <p class="c-article-list__title c-article-list__title--small">最短で学んだ私の英語学習方法</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>

@endsection