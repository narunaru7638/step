<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Step;

class StepController extends Controller
{
    //
    public function index() {
//       ページネーションなしバージョン
//        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->get();
//        return \Response::json($steps_ajax);
        //       ページネーションなしバージョンここまで

//        dd($step->id);
//        var_dump($step->id);
//
//        {{$step->id}}

//        if($step->id == 0){
            $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);


//        }else{
//            $steps_ajax = \App\Step::with('user', 'category')->where('category_id', $step->id)->orderBy('created_at', 'desc')->paginate(10);
////            $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);
//
//
//
//        }
//        dd($steps_ajax);


        return \Response::json($steps_ajax);


    }

    public function categoryIndex(Step $step) {
//       ページネーションなしバージョン
//        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->get();
//        return \Response::json($steps_ajax);
        //       ページネーションなしバージョンここまで

//        dd($step->id);
//        var_dump($step->id);
//
//        {{$step->id}}



            $steps_ajax = \App\Step::with('user', 'category')->where('category_id', $step->id)->orderBy('created_at', 'desc')->paginate(10);
//            $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);



//        dd($steps_ajax);


        return \Response::json($steps_ajax);


    }


}
