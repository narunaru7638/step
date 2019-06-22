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
                <div id="steps-index">
                    <div>
                        <div class="l-article-area-type-card">
                            <v-card   v-for="(step, index) in items.data" v-if="index <= 1" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" :category_id="step.category.id" v-bind:user_name="step.user.name" v-bind:user_id="step.user.id">
                            </v-card>
                        </div>
                        <div class="l-article-area-type-card">
                            <v-card   v-for="(step, index) in items.data" v-if="index >= 2 && index <= 3" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" :category_id="step.category.id" v-bind:user_name="step.user.name" v-bind:user_id="step.user.id">
                            </v-card>
                        </div>
                        <div class="l-article-area-type-list">
                            <v-list   v-for="(step, index) in items.data" v-if="index >= 4 && index <= 9" :index="index" :id="step.id" v-bind:title="step.title" v-bind:created_at="step.created_at" v-bind:pic_img="step.pic_img" v-bind:category_name="step.category.name" :category_id="step.category.id" v-bind:user_name="step.user.name" v-bind:user_id="step.user.id">
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