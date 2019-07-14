<?php

namespace App\Http\Controllers;

use App\Step;
use App\Childstep;
use App\Challenge;
use App\Progress;
use App\Report;


use Illuminate\Http\Request;
use App\Http\Requests\EditProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{

    //カテゴリー指定しなかった場合のSTEP一覧表示
    public function edit(Progress $progress)
    {
        $progress_id = $progress->id;

        $steps_new = null;
        $steps_rank = null;
        $step_detail = null;
        $childstep = null;
        $challenge = null;
        $progress = null;
        $reports = null;
        $challenge_exists_flg = null;
        $progress_exists_flg = null;

        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        //指定されたIDのSTEPデータを取得
        $progress = Progress::find($progress_id);
        $challenge = Challenge::wherehas('progresses', function ($q) use ($progress_id) {
            $q->where('id', $progress_id);
        })->orderBy('created_at', 'desc')->first();
        $childstep = Childstep::wherehas('progresses', function ($q) use ($progress_id) {
            $q->where('id', $progress_id);
        })->orderBy('created_at', 'desc')->first();
        $step_detail = Step::wherehas('childsteps', function ($q) use ($childstep) {
            $q->where('id', $childstep->id);
        })->orderBy('created_at', 'desc')->first();

        $reports = Report::where('progress_id', $progress->id)->get();


        return view('progress/edit', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
            'step_detail' => $step_detail,
            'childstep' => $childstep,
            'challenge' => $challenge,
            'progress' => $progress,
            'reports' => $reports,

        ]);
    }

    public function update(Progress $progress,EditProgress $request)
    {

        if($request->working_time) {
            $progress = Progress:: where('id', $progress->id)->first();
            $total_working_time = $progress->total_working_time + $request->working_time;


            $childstep = Childstep::wherehas('progresses', function ($q) use ($progress) {
                    $q->where('id', $progress->id); })->first();

            //
            if( $total_working_time >= $childstep->time_required){
                $percentage_achievement = 100;
                $progress->complete_flg = 1;

                //次のSTEPの
                $challenge_id = $progress->challenge_id;
                $next_childstep_id = $progress->childstep_id + 1;
                $next_progress = Progress:: where('challenge_id', $challenge_id)->where('childstep_id', $next_childstep_id)->first();
                if($next_progress){
                    $next_progress->input_possible_flg = 1;
                    $next_progress->save();
                }



            }else{
                $percentage_achievement = $total_working_time / $childstep->time_required * 100;
            }

            $progress->percentage_achievement = $percentage_achievement;
            $progress->total_working_time = $total_working_time;

            $progress->save();


        }

        if($request->report) {
            $report = new Report();
            $report->progress_id = $progress->id;
            $report->content = $request->report;
            $report->save();
        }

        return redirect()->route('steps.index', ['id' => 0 ]);


    }
}