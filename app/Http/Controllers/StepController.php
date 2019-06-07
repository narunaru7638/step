<?php

namespace App\Http\Controllers;

use App\Step;
use App\Childstep;
use Illuminate\Http\Request;
//use App\Http\Requests\Step;

use App\Http\Requests\CreateStep;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Log;



class StepController extends Controller
{
    //
    //
//    public function index()
//    {
//        $id = 1;

    public function index()
    {

        //すべてのstepを取得する
//        $steps = Step::all();



        //すべてのSTEPのデータを登録が新しい順に取得する
        $steps = DB::table('steps')
                    ->join('users','steps.user_id', '=', 'users.id')
                    ->orderByRaw('steps.created_at DESC')
                    ->get();
//        dump($steps);
//        $steps = Step::where('id', 1)->get();
//        $steps = Step->orderBy('created_at', 'desc')->get();
//        $steps = DB::table('step')->orderBy('id')->chunk(2, function ($users) {
//            // レコードの処理…
//
//            return false;
//        });

        return view('steps/index', [
            'steps' => $steps,
        ]);
    }

    public function detail(int $id)
//    public function detail()

    {
        //すべてのstepを取得する
//        $id = 1;
        $step = Step::find($id);

        $childstep1 = Childstep::where('step_id', $id)->where('number_of_step', '1')->first();
        $childstep2 = Childstep::where('step_id', $id)->where('number_of_step', '2')->first();
        $childstep3 = Childstep::where('step_id', $id)->where('number_of_step', '3')->first();





        return view('steps/detail', [
            'step' => $step,
            'childstep1' => $childstep1,
            'childstep2' => $childstep2,
            'childstep3' => $childstep3,


        ]);

//        return "Hello world";
    }

    public function showCreateForm()
    {
        return view('steps/create');
    }

    public function create(CreateStep $request)
    {

            //stepモデルのインスタンスを作成する
            $step = new Step();

//            dump($request);

            //入力値を代入する
            $step->title = $request->step_title;
            $step->content = $request->step_content;
            $step->category_id = $request->step_category;
            $step->user_id = 1;
            $step->pic_img = $request->step_img;


        //インスタンスの状態をデータベースに書き込む
            $step->save();


            for ($i = 1; $i <= 3; $i++) {
                $childstep = new Childstep();

//                $request_title = 'childstep_title_'.$i;
//                $request_content = 'childstep_content_'.$i;
                $request_title = 'childstep'.$i.'_title';
                $request_content = 'childstep'.$i.'_content';


                $childstep->title = $request->$request_title;
                $childstep->content = $request->$request_content;
                $childstep->step_id = $step->id;
                $childstep->number_of_step = $i;
                $childstep->save();

            }



//        $now = Carbon::now();
//
//        $childstep_datum = [
//            ['title' => $request->childstep_title_1, 'content' => $request->childstep_content_1, 'step_id' => 2, 'number_of_step' => 1, 'created_at' => $now, 'updated_at' => $now],
//            ['title' => $request->childstep_title_2, 'content' => $request->childstep_content_2, 'step_id' => 2, 'number_of_step' => 2, 'created_at' => $now, 'updated_at' => $now],
//            ['title' => $request->childstep_title_3, 'content' => $request->childstep_content_3, 'step_id' => 2, 'number_of_step' => 3, 'created_at' => $now, 'updated_at' => $now],
//        ];
//
//        $cli = DB::table('childsteps')
//            -> insert($childstep_datum);

        return redirect()->route('steps.index', [
                'id' => $step->id,
            ]);
    }

}
