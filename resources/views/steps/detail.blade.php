@extends('layout')

@section('page-title')
    <title>STEP詳細 | STEP</title>
@endsection

@section('content')
{{--<div class="l-main-wrap">--}}
{{--    <main class="l-main l-main--2column">--}}
{{--        <section class="c-container c-container--2column">--}}
{{--            <h2 class="c-container__title">STEP</h2>--}}
{{--            <div class="c-container__body">--}}
{{--                <div class="c-step-detail">--}}
{{--                    <div class="c-step-detail__header">--}}
{{--                        <div class="c-step-detail__info">--}}
{{--                            <div class="c-step-detail__category">--}}
{{--                                <div class="c-step-detail__category-head">--}}
{{--                                    カテゴリー--}}
{{--                                </div>--}}
{{--                                <div class="c-step-detail__category-body">--}}
{{--                                    {{ $step->category_id }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="c-step-detail__user">--}}
{{--                                <div class="c-step-detail__user-head">--}}
{{--                                    作成者--}}
{{--                                </div>--}}
{{--                                <div class="c-step-detail__user-body">--}}
{{--                                    {{ $step->user_id }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="c-step-detail__badge">--}}
{{--                            挑戦中--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="c-step-detail__title">--}}
{{--                        {{ $step->title }}--}}
{{--                    </div>--}}


{{--                    <div class="c-step-detail__body">--}}
{{--                        {{ $step->content }}--}}


{{--                    </div>--}}

{{--                </div>--}}



{{--                <div class="c-one-child-step-area">--}}

{{--                    <div class="c-one-child-step">--}}

{{--                        <div class="c-panel-one-child-step">--}}
{{--                            <p class="c-panel-one-child-step__title-head">STEP1</p>--}}
{{--                            <p class="c-panel-one-child-step__title-body">{{ $childstep1->title }}</p>--}}

{{--                            <p class="c-panel-one-child-step__detail-head">詳細</p>--}}
{{--                            <p class="c-panel-one-child-step__detail-body">{{ $childstep1->content }}</p>--}}
{{--                        </div>--}}

{{--                        <input type="submit" class="c-btn c-btn--complete c-form__submit" value="クリア">--}}
{{--                    </div>--}}

{{--                    <div class="c-one-child-step">--}}

{{--                        <div class="c-panel-one-child-step">--}}
{{--                            <p class="c-panel-one-child-step__title-head">STEP2</p>--}}
{{--                            <p class="c-panel-one-child-step__title-body">{{ $childstep2->title }}</p>--}}

{{--                            <p class="c-panel-one-child-step__detail-head">詳細</p>--}}
{{--                            <p class="c-panel-one-child-step__detail-body">{{ $childstep1->content }}</p>--}}

{{--                        </div>--}}

{{--                        <input type="submit" class="c-btn c-btn--complete c-form__submit" value="クリア">--}}
{{--                    </div>--}}

{{--                    <div class="c-one-child-step">--}}

{{--                        <div class="c-panel-one-child-step">--}}
{{--                            <p class="c-panel-one-child-step__title-head">STEP3</p>--}}
{{--                            <p class="c-panel-one-child-step__title-body">{{ $childstep2->title }}</p>--}}

{{--                            <p class="c-panel-one-child-step__detail-head">詳細</p>--}}
{{--                            <p class="c-panel-one-child-step__detail-body">{{ $childstep2->content }}</p>--}}

{{--                        </div>--}}

{{--                        <input type="submit" class="c-btn c-btn--complete c-form__submit c-panel-one-child-step__input" value="クリア">--}}

{{--                    </div>--}}
{{--                </div>--}}







{{--                <form class="c-form">--}}
{{--                    <input type="submit" class="c-btn c-btn--small c-form__submit" value="挑戦をやめる">--}}
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
        <h2 class="l-page-title__title">STEP DETAIL</h2>
        <h3 class="l-page-title__sub-title">ステップ詳細</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--2column">
                <div class="c-detail-step">
                    <div class="c-detail-step__title">{{ $step->title }}</div>
                    <div class="c-detail-step__info">
                        <div class="c-detail-step__info--left">
                            <div class="c-detail-step__category">{{ $step->category_id }}</div>
                            <div class="c-detail-step__date">{{ $step->created_at }}</div>
                            <div class="c-detail-step__username">{{ $step->user_id }}</div>
                            <div class="c-detail-step__required-time">{{ $step->required_time }}</div>
                        </div>
                        <div class="c-detail-step__info--right">
                            <div class="c-detail-step__number-of-challenger">チャレンジした人：{{ $step->number_of_challenger }}人</div>
                            <div class="c-detail-step__challenge-flg">挑戦中</div>
                        </div>
                    </div>
                    <img src="/img/programming.jpg" alt="" class="c-detail-step__img">
                    <div class="c-detail-step__text">{{ $step->content }}</div>

                    <div class="c-detail-childstep">
                        <div class="c-detail-childstep__title">STEP1:{{ $childstep1->title }}</div>
                        <div class="c-detail-childstep__body">
                            <img src="/img/programming.jpg" alt="" class="c-detail-childstep__img">
                            <div class="c-detail-childstep__content">
                                <div class="c-detail-childstep__info">
                                    <div class="c-detail-childstep__info--left">
                                        <div class="c-detail-childstep__required-time">{{ $childstep1->required_time }}時間</div>
                                    </div>
                                    <div class="c-detail-childstep__info--right">
                                        <div class="c-detail-childstep__challenge-flg">未挑戦</div>
                                    </div>
                                </div>
                                <div class="c-detail-childstep__text">{{ $childstep1->content }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="c-detail-childstep">
                        <div class="c-detail-childstep__title">STEP2:{{ $childstep2->title }}</div>
                        <div class="c-detail-childstep__body">
                            <img src="/img/programming.jpg" alt="" class="c-detail-childstep__img">
                            <div class="c-detail-childstep__content">
                                <div class="c-detail-childstep__info">
                                    <div class="c-detail-childstep__info--left">
                                        <div class="c-detail-childstep__required-time">{{ $childstep2->required_time }}時間</div>
                                    </div>
                                    <div class="c-detail-childstep__info--right">
                                        <div class="c-detail-childstep__challenge-flg">未挑戦</div>
                                    </div>
                                </div>
                                <div class="c-detail-childstep__text">{{ $childstep2->content }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="c-detail-childstep">
                        <div class="c-detail-childstep__title">STEP3:{{ $childstep3->title }}</div>
                        <div class="c-detail-childstep__body">
                            <img src="/img/programming.jpg" alt="" class="c-detail-childstep__img">
                            <div class="c-detail-childstep__content">
                                <div class="c-detail-childstep__info">
                                    <div class="c-detail-childstep__info--left">
                                        <div class="c-detail-childstep__required-time">{{ $childstep3->required_time }}時間</div>
                                    </div>
                                    <div class="c-detail-childstep__info--right">
                                        <div class="c-detail-childstep__challenge-flg">未挑戦</div>
                                    </div>
                                </div>
                                <div class="c-detail-childstep__text">{{ $childstep3->content }}</div>
                            </div>
                        </div>
                    </div>



                    <form class="c-form">


                        <input type="submit" class="c-btn c-form__submit" value="このSTEPにチャレンジする">

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
                            <img src="/img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
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
                            <img src="/img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
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
                            <img src="/img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
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
                            <img src="/img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
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