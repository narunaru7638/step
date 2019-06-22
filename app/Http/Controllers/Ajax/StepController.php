<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Step;

class StepController extends Controller
{
    //カテゴリーのパラメータがないルーティングでは全STEPデータを取得
    public function index() {
        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);
        return \Response::json($steps_ajax);
    }

    //カテゴリーのパラメータがあるルーティングではカテゴリーごとの全STEPデータを取得
    public function categoryIndex(Step $step) {
        $steps_ajax = \App\Step::with('user', 'category')->where('category_id', $step->id)->orderBy('created_at', 'desc')->paginate(10);
        return \Response::json($steps_ajax);
    }
}
