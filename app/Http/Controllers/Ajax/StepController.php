<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StepController extends Controller
{
    //
    public function index($id) {
//       ページネーションなしバージョン
//        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->get();
//        return \Response::json($steps_ajax);
        //       ページネーションなしバージョンここまで




        if($id === 0){
            $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);


        }else{
            $steps_ajax = \App\Step::with('user', 'category')->where('category_id', $id)->orderBy('created_at', 'desc')->paginate(10);



        }


        return \Response::json($steps_ajax);


    }

}
