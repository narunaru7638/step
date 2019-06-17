@extends('layout')

@section('page-title')
    <title>STEP一覧 | STEP</title>
@endsection


@section('content')



<div class="l-home">

    <div class="l-page-title">
        <h2 class="l-page-title__title">STEP LIST</h2>
        <h3 class="l-page-title__sub-title">ステップ一覧</h3>
    </div>

    <div class="c-container">
        <div class="l-main-wrap">
            <main class="l-main l-main--2column">

{{--                @foreach($steps as $key=>$step)--}}
{{--                    @if( $key <= 3 )--}}
{{--                        @if( $key % 2 === 0 )--}}
{{--                            <div class="l-article-area-type-card">--}}
{{--                        @endif--}}
{{--                                <div class="c-article-card">--}}
{{--                                        <a href="{{ route('steps.detail', ['id' => $step->getId()]) }}"><img src="/storage/{{ $step->getPicImg() }}" alt="" class="c-article-card__img"></a>--}}
{{--                                    <div class="c-article-card__info">--}}
{{--                                        <p class="c-article-card__category">{{ $step->getCategoryName() }}</p>--}}
{{--                                        <p class="c-article-card__username">{{ $step->getUserName() }}</p>--}}
{{--                                        <p class="c-article-card__date">{{ $step->getCreatedAt() }}</p>--}}
{{--                                    </div>--}}
{{--                                    <a href="{{ route('steps.detail', ['id' => $step->getId()]) }}"><p class="c-article-card__title">{{ $step->getTitle() }}</p></a>--}}
{{--                                </div>--}}
{{--                        @if( $key % 2 === 1 )--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endif--}}

{{--                    @if( $key >= 4 && $key < 10)--}}

{{--                        @if( $key === 4 )--}}
{{--                            <div class="l-article-area-type-list">--}}
{{--                        @endif--}}
{{--                                <div class="c-article-list">--}}

{{--                                    <a class="c-article-list__img" href="{{ route('steps.detail', ['id' => $step->getId()]) }}"><img src="/storage/{{ $step->getPicImg() }}" alt="" ></a>--}}
{{--                                    <div class="c-article-list__content">--}}
{{--                                        <div class="c-article-list__info">--}}
{{--                                            <p class="c-article-list__category">{{ $step->getCategoryName() }}</p>--}}
{{--                                            <p class="c-article-list__username">{{ $step->getUserName() }}</p>--}}
{{--                                            <p class="c-article-list__date">{{ $step->getCreatedAt() }}</p>--}}
{{--                                        </div>--}}
{{--                                        <a href="{{ route('steps.detail', ['id' => $step->getId()]) }}"><p class="c-article-list__title">{{ $step->getTitle() }}</p></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        @if( $key === 10 )--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                     @endif--}}
{{--                @endforeach--}}

{{--                vueで表示--}}
{{--                    <div id="steps-index">--}}
{{--                        <h1>ステップ一覧</h1>--}}
{{--                        <div class="l-article-area-type-list">--}}
{{--                            <div class="c-article-list" v-for="step in steps">--}}
{{--                                    <a class="c-article-list__img" v-bind:href="'/detail-steps/'+step.id">--}}
{{--                                        <img v-if="step.pic_img !== null" v-bind:src="'/storage/'+step.pic_img" alt="" >--}}
{{--                                        <img v-if="step.pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >--}}
{{--                                </a>--}}
{{--                                <div class="c-article-list__content">--}}
{{--                                    <div class="c-article-list__info">--}}
{{--                                        @{{ step.category.name }}--}}
{{--                                        <p class="c-article-list__category" v-text="step.category.name"></p>--}}
{{--                                        <p class="c-article-list__username" v-text="step.user.name"></p>--}}
{{--                                        <p class="c-article-list__date" v-text="step.created_at"></p>--}}
{{--                                    </div>--}}
{{--                                    <a v-bind:href="'/detail-steps/'+step.id"><p class="c-article-list__title" v-text="step.title"></p></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="steps-card">--}}
{{--                        <h1>ステップ一覧</h1>--}}
{{--                        <div v-for="(step, index) in steps">--}}
{{--                                <steps-card class="l-article-area-type-card"  :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                                </steps-card>--}}
{{--                                <steps-list class="l-article-area-type-list" v-if="index >= 4 && index <= 9" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                                </steps-list>--}}
{{--                        </div>--}}
{{--                    </div>--}}




{{--               API用 --}}
{{--                //       ページネーションなしバージョン--}}
{{--                    <div id="steps-card-index1">--}}
{{--                        <div class="l-article-area-type-card">--}}
{{--                            <steps-card v-for="(step, index) in steps" v-if="index <= 1"  :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                            </steps-card>--}}
{{--                        </div>--}}
{{--                        <div class="l-article-area-type-card">--}}
{{--                            <steps-card v-for="(step, index) in steps" v-if="index >= 2 && index<=3"  :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                            </steps-card>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="steps-list-index">--}}
{{--                        <div class="l-article-area-type-list">--}}
{{--                                <steps-list  v-for="(step, index) in steps" v-if="index >= 2 && index <= 9" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                                </steps-list>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                //       ページネーションなしバージョンここまで--}}




{{--                <div style="padding:15px;" id="steps-list-index2">--}}
{{--                    <ul class="list-group">--}}
{{--                        <li class="list-group-item" v-for="step in steps.data" v-text="item.name"></li>--}}
{{--                    </ul>--}}
{{--                    <br>--}}
{{--                    <v-pagination :data="items" @move-page="movePage($event)"></v-pagination>--}}
{{--                </div>--}}


{{--                <div id="steps-card-index1">--}}
{{--                    <div class="l-article-area-type-card">--}}
{{--                        <steps-card v-for="(step, index) in items" v-if="index <= 1"  :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                        </steps-card>--}}
{{--                    </div>--}}
{{--                    <div class="l-article-area-type-card">--}}
{{--                        <steps-card v-for="(step, index) in items" v-if="index >= 2 && index<=3"  :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                        </steps-card>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div id="steps-list-index">--}}
{{--                    <div class="l-article-area-type-list">--}}
{{--                            <steps-list  v-for="(step, index) in steps" v-if="index >= 2 && index <= 9" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">--}}
{{--                            </steps-list>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div id="app">
                    <div>
                        <div class="l-article-area-type-card">
                            <v-card   v-for="(step, index) in items.data" v-if="index <= 1" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">
                            </v-card>
                        </div>
                        <div class="l-article-area-type-card">
                            <v-card   v-for="(step, index) in items.data" v-if="index >= 2 && index <= 3" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">
                            </v-card>
                        </div>
                        <div class="l-article-area-type-list">
                            <v-list   v-for="(step, index) in items.data" v-if="index >= 4 && index <= 9" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" v-bind:user_name="step.user.name">
                            </v-list>
                        </div>
                    </div>
                    <v-pagination :data="items" @move-page="movePage($event)"></v-pagination>


                </div>

            </main>

            @include('partials.sidebar')


        </div>



    </div>

</div>


@endsection