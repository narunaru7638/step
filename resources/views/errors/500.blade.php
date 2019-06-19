@extends('layout')

@section('content')
    <div class="l-home">
        <div class="l-page-title">
            <h2 class="l-page-title__title">サーバ側でエラーが発生しています。しばらく経ってから再度アクセスしてみてください。</h2>
        </div>
        <div class="l-main-wrap">
            <main class="l-main l-main--1column">
                <a class="l-home__page-back-link" href="{{ route('steps.index') }}">&#171;STEP一覧画面に戻る</a>
            </main>
        </div>
    </div>
@endsection