<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StepController extends Controller
{
    //
    public function index() {


        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->get();

//        $steps_ajax = \App\Step::all();

//        $steps_ajax = \App\Step::all()


//        dump($steps_ajax);
//        dump('testadfadfa');

//        dd($steps_ajax);

//        $steps_ajax = \App\Step::with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);

//        dd($steps_ajax);

//        $steps_ajax = json_encode($steps_ajax);

//        $steps_ajax = \App\Step::all();  // ←自動でjsonにしてくれます

//        return new Response($steps_ajax);  // ←自動でjsonにしてくれます

//        return $steps_ajax;  // ←自動でjsonにしてくれます


//        return \App\Step::all();  // ←自動でjsonにしてくれます

        return \Response::json($steps_ajax);
    }

}
