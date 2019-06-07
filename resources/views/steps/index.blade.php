@extends('layout')

@section('page-title')
    <title>STEP一覧 | STEP</title>
@endsection

{{--@section('nav')--}}
{{--        <nav class="l-header-container__global-nav">--}}
{{--            <ul class="l-nav">--}}
{{--                <li class="l-nav__item"><a class="l-nav__link" href="">マイページ</a></li>--}}
{{--                <li class="l-nav__item"><a class="l-nav__link" href="">ログアウト</a></li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--        <nav class="l-sp-menu js-toggle-sp-menu-target">--}}
{{--            <ul class="l-sp-menu__list">--}}
{{--                <li class="l-sp-menu__list-item"><a class="l-sp-menu__link" href="">マイページ</a></li>--}}
{{--                <li class="l-sp-menu__list-item"><a class="l-sp-menu__link" href="">ログアウト</a></li>--}}
{{--                <li class="l-sp-menu__list-item"><a class="l-sp-menu__link" href="">STEP登録</a></li>--}}
{{--                <li class="l-sp-menu__list-item"><a class="l-sp-menu__link" href="">プロフィール編集</a></li>--}}
{{--                <li class="l-sp-menu__list-item"><a class="l-sp-menu__link" href="">パスワード変更</a></li>--}}
{{--                <li class="l-sp-menu__list-item"><a class="l-sp-menu__link" href="">退会</a></li>--}}
{{--            </ul>--}}
{{--            <form class="c-form u-margin__sp-menu">--}}
{{--                <label for="category" class="c-form__label">カテゴリーで検索--}}
{{--                    <select name="example1" class="c-form__input " id="category">--}}
{{--                        <option value="サンプル1">未入力</option>--}}
{{--                        <option value="サンプル2">プログラミング</option>--}}
{{--                        <option value="サンプル3">ダイエット</option>--}}
{{--                        <option value="サンプル4">英語</option>--}}
{{--                        <option value="サンプル5">資格</option>--}}
{{--                    </select>--}}
{{--                    <p class="c-form__err-msg">入力されていません</p>--}}
{{--                </label>--}}
{{--                <input type="submit" class="c-btn c-form__submit u-margin__sp-menu-submit">--}}
{{--            </form>--}}
{{--        </nav>--}}
{{--@endsection--}}

@section('content')
{{--<div class="l-main-wrap">--}}
{{--    <div class="l-sidebar l-sidebar--left">--}}

{{--        <form class="c-form c-form__2column">--}}

{{--            <label for="category" class="c-form__label">カテゴリー--}}
{{--                <select name="example1" class="c-form__input c-form__input--sidebar" id="category">--}}
{{--                    <option value="サンプル1">未入力</option>--}}
{{--                    <option value="サンプル2">プログラミング</option>--}}
{{--                    <option value="サンプル3">ダイエット</option>--}}
{{--                    <option value="サンプル4">英語</option>--}}
{{--                    <option value="サンプル5">資格</option>--}}
{{--                </select>--}}
{{--                <p class="c-form__err-msg">入力されていません</p>--}}
{{--            </label>--}}

{{--            <input type="submit" class="c-btn c-btn--sidebar c-form__submit">--}}

{{--        </form>--}}

{{--    </div>--}}

{{--    <main class="l-main l-main--2column">--}}
{{--        <section class="c-container c-container--2column">--}}
{{--            <h2 class="c-container__title">STEP一覧</h2>--}}
{{--            <div class="c-container__body">--}}

{{--                <div class="c-container-panel-step">--}}

{{--                    @foreach($steps as $step)--}}
{{--                        <div class="c-panel-step">--}}
{{--                            <div class="c-panel-step__header">--}}
{{--                                <div class="c-panel-step__title">--}}
{{--                                    {{ $step->title }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="c-panel-step__body">--}}
{{--                                @foreach($childsteps as $childstep)--}}
{{--                                    <div class="c-panel-step__child-step-title">{{$childstep->number_of_step}}.{{$childstep->title}}</div>--}}
{{--                                @endforeach--}}
{{--                                <div class="c-panel-step__detail">--}}
{{--                                    {{ $step->content }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="c-panel-step__footer">--}}
{{--                                <div class="c-panel-step__info">--}}
{{--                                    <div class="c-panel-step__info-one">--}}
{{--                                        <div class="c-panel-step__info-label">--}}
{{--                                            カテゴリー--}}
{{--                                        </div>--}}
{{--                                        <div class="c-panel-step__info-contents">--}}
{{--                                            プログラミング--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="c-panel-step__info-one">--}}
{{--                                        <div class="c-panel-step__info-label">--}}
{{--                                            作成者--}}
{{--                                        </div>--}}
{{--                                        <div class="c-panel-step__info-contents">--}}
{{--                                            たろうさん--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}



{{--                </div>--}}
{{--                <div class="c-pagination">--}}
{{--                    <!--                            <div class="c-pagination__page c-pagination__page--prev">&#12298;</div>-->--}}

{{--                    <ul class="c-pagination__list">--}}

{{--                        <li class="c-pagination__list-item c-pagination__list-item--prev"><a href="" class="c-pagination__link">&lt;</a></li>--}}
{{--                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">2</a></li>--}}
{{--                        <li class="c-pagination__list-item c-pagination__list-item--now"><a href="" class="c-pagination__link c-pagination__link--now">3</a></li>--}}
{{--                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">4</a></li>--}}
{{--                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">5</a></li>--}}
{{--                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">6</a></li>--}}
{{--                        <li class="c-pagination__list-item c-pagination__list-item--next"><a href="" class="c-pagination__link">&gt;</a></li>--}}
{{--                    </ul>--}}




{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}



{{--    </main>--}}

{{--</div>--}}

{{--////////aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa--}}



<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">STEP LIST</h2>
        <h3 class="l-page-title__sub-title">ステップ一覧</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--2column">

                @foreach($steps as $key=>$step)
                    @if( $key <= 3 )
                        @if( $key % 2 === 0 )
                            <div class="l-article-area-type-card">
                        @endif
                                <div class="c-article-card">
                                    <img src="/img/programming.jpg" alt="" class="c-article-card__img">
                                    <div class="c-article-card__info">
                                        <p class="c-article-card__category">英語</p>
                                        <p class="c-article-card__username">{{ $step->name }}</p>
                                        <p class="c-article-card__date">{{ $step->created_at }}</p>
                                    </div>
                                    <p class="c-article-card__title">{{ $step->title }}</p>
                                </div>
                        @if( $key % 2 === 1 )
                            </div>
                        @endif
                    @endif

                    @if( $key >= 4)

                        @if( $key === 4 )
                            <div class="l-article-area-type-list">
                        @endif
                                <div class="c-article-list">
                                    <img src="/img/programming.jpg" alt="" class="c-article-list__img">
                                    <div class="c-article-list__content">
                                        <div class="c-article-list__info">
                                            <p class="c-article-list__category">英語</p>
                                            <p class="c-article-list__username">{{ $step->name }}</p>
                                            <p class="c-article-list__date">{{ $step->created_at }}</p>
                                        </div>
                                        <p class="c-article-list__title">{{ $step->title }}</p>
                                    </div>
                                </div>
                        @if( $key === 4 )
                            </div>
                        @endif
                     @endif
                @endforeach



                <div class="c-pagination">
                    <ul class="c-pagination__list">
                        <li class="c-pagination__list-item c-pagination__list-item--prev"><a href="" class="c-pagination__link">&lt;</a></li>
                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">2</a></li>
                        <li class="c-pagination__list-item c-pagination__list-item--now"><a href="" class="c-pagination__link c-pagination__link--now">3</a></li>
                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">4</a></li>
                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">5</a></li>
                        <li class="c-pagination__list-item"><a href="" class="c-pagination__link">6</a></li>
                        <li class="c-pagination__list-item c-pagination__list-item--next"><a href="" class="c-pagination__link">&gt;</a></li>
                    </ul>
                </div>
            </main>

            <div class="l-sidebar l-sidebar--left">
                <div class="l-sidebar__container">
                    <h2 class="l-sidebar__title">WHATS NEW</h2>
                    <h3 class="l-sidebar__sub-title">最新情報</h3>
                    <div class="l-sidebar__content">
                        @foreach($steps as $key=>$step)
                            @if( $key <= 4 )

                                <div class="c-article-list c-article-list--small">
                                    <icon class="c-article-list__icon c-article-list__icon-small">NEW</icon>
                                    <img src="/img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">
                                    <div class="c-article-list__content c-article-list__content--small">
                                        <div class="c-article-list__info c-article-list__info--small">
                                            <p class="c-article-list__category c-article-list__category--small">英語</p>
                                            <p class="c-article-list__username c-article-list__username--small">{{ $step->name }}</p>
                                            <p class="c-article-list__date c-article-list__date--small">{{ $step->created_at }}</p>
                                        </div>
                                        <p class="c-article-list__title c-article-list__title--small">{{ $step->title }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
{{--                        <div class="c-article-list c-article-list--small">--}}
{{--                            <icon class="c-article-list__icon c-article-list__icon-small">NEW</icon>--}}
{{--                            <img src="/img/programming.jpg" alt="" class="c-article-list__img c-article-list__img--small">--}}
{{--                            <div class="c-article-list__content c-article-list__content--small">--}}
{{--                                <div class="c-article-list__info c-article-list__info--small">--}}
{{--                                    <p class="c-article-list__category c-article-list__category--small">英語</p>--}}
{{--                                    <p class="c-article-list__username c-article-list__username--small">はなこさん</p>--}}
{{--                                    <p class="c-article-list__date c-article-list__date--small">2019/05/03</p>--}}
{{--                                </div>--}}
{{--                                <p class="c-article-list__title c-article-list__title--small">最短で学んだ私の英語学習方法</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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