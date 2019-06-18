@extends('layout')

@section('page-title')
    <title>{{ $user_info->name }}さんのプロフィール | STEP</title>
@endsection

@section('content')

<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">{{ $user_info->name }}'s PROFILE</h2>
        <h3 class="l-page-title__sub-title">{{ $user_info->name }}さんのプロフィール</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">
                <div class="p-profile-show-area">
                    <div class="p-profile-show-area__one-info">
                        <label for="user-name" class="p-profile-show-area__label">ユーザネーム</label>
                        <p class="p-profile-show-area__content">{{ $user_info->name }}</p>
                    </div>
                    <div class="p-profile-show-area__one-info">
                        <label for="user-name" class="p-profile-show-area__label">自己紹介文</label>
                        <p class="p-profile-show-area__content">{{ $user_info->profile }}</p>
                    </div>
                    <div class="p-profile-show-area__one-info">
                        <label for="user-name" class="p-profile-show-area__label">プロフィール画像</label>
                        <img src="/storage/{{ $user_info->getPicIcon() }}" alt="" class="p-profile-show-area__img">
                    </div>
                </div>

                <div class="c-article-area-type-list">
                    <h3 class="c-article-area-type-list__title">投稿したSTEP</h3>
                    @foreach ($registed_steps as $key => $registed_step)
                        <div class="c-article-list">
                            <a  class="c-article-list__img" href="{{ route('steps.detail', ['id' => $registed_step->getId()]) }}"><img src="/storage/{{ $registed_step->getPicImg() }}" alt=""></a>
                            <div class="c-article-list__content">
                                <div class="c-article-list__info">
                                    <a href="{{ route('steps.index', ['id' => $registed_step->getCategoryId()]) }}"><p class="c-article-list__category">{{ $registed_step->getCategoryName() }}</p></a>
                                    <a href="{{ route('profile.show', ['id' => $registed_step->getUserId()]) }}"><p class="c-article-list__username">{{ $registed_step->getUserName() }}</p></a>
                                    <p class="c-article-list__date">{{ $registed_step->getCreatedAt() }}</p>
                                </div>
                                <a href="{{ route('steps.detail', ['id' => $registed_step->getId()]) }}"><p class="c-article-list__title">{{ $registed_step->getTitle() }}</p></a>
                            </div>
                        </div>
                    @endforeach
                </div>



            </main>



        </div>
    </div>

</div>

</div>

@endsection