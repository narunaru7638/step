<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StepController extends Controller
{
    //
    public function index() {
//       ページネーションなしバージョン
//        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->get();
//        return \Response::json($steps_ajax);
        //       ページネーションなしバージョンここまで


//        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);

        $id = 0;

        if($id === 0){
            $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);

//            dd($steps_ajax);

        }else{
            $steps_ajax = \App\Step::with('user', 'category')->where('category_id', $id)->orderBy('created_at', 'desc')->paginate(10);

        }


        return \Response::json($steps_ajax);


    }

}
