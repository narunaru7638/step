@extends('layout')

@section('page-title')
    <title>マイページ | STEP</title>
@endsection

@section('content')
<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">MY PAGE</h2>
        <h3 class="l-page-title__sub-title">マイページ</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--2column">

                <div class="c-article-area-type-list">
                    <h3 class="c-article-area-type-list__title">チャレンジ中のSTEP</h3>
                    @foreach($steps_my_challenge as $key=>$step_my_challenge)
                        <div class="c-article-list">
                            <a class="c-article-list__img" href="{{ route('steps.detail', ['id' => $step_my_challenge->getId()]) }}"><img src="/storage/{{ $step_my_challenge->getPicImg() }}" alt="" ></a>
                            <div class="c-article-list__content">
                                <div class="c-article-list__info">
                                    <p class="c-article-list__category">{{ $step_my_challenge->getCategoryName() }}</p>
                                    <p class="c-article-list__username">{{ $step_my_challenge->getUserName() }}</p>
                                    <p class="c-article-list__date">{{ $step_my_challenge->getCreatedAt() }}</p>
                                </div>
                                <a href="{{ route('steps.detail', ['id' => $step_my_challenge->getId()]) }}"><p class="c-article-list__title">{{ $step_my_challenge->getTitle() }}</p></a>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="c-article-area-type-list">
                    <h3 class="c-article-area-type-list__title">あなたの投稿したSTEP</h3>
                    @foreach($steps_my_regist as $key=>$step_my_regist)
                        <div class="c-article-list">
                            <a class="c-article-list__img" href="{{ route('steps.detail', ['id' => $step_my_regist->getId()]) }}"><img src="/storage/{{ $step_my_challenge->getPicImg() }}" alt="" ></a>
                            <div class="c-article-list__content">
                                <div class="c-article-list__info">
                                    <p class="c-article-list__category">{{ $step_my_regist->getCategoryName() }}</p>
                                    <p class="c-article-list__username">{{ $step_my_regist->getUserName() }}</p>
                                    <p class="c-article-list__date">{{ $step_my_regist->getCreatedAt() }}</p>
                                </div>
                                <a href="{{ route('steps.detail', ['id' => $step_my_regist->getId()]) }}"><p class="c-article-list__title">{{ $step_my_regist->getTitle() }}</p></a>
                            </div>
                        </div>
                    @endforeach
                </div>


            </main>
            @include('partials.sidebar')


        </div>

    </div>

</div>
@endsection