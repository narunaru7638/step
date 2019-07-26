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

    //進捗更新のフォーム表示処理
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

        //指定されたIDのSTEPデータを取得
        $progress = Progress::find($progress_id);

        //選択した子STEPがまだ進捗入力可能となっていなければ、URLに不正な値を入れられたとしてリダイレクト
        //子STEPに紐づくSTEPが削除されていれば、URLに不正な値を入れられたとしてリダイレクト
        if($progress->input_possible_flg !== 1 || $progress->challenge->delete_flg === 1){
            return redirect()->route('steps.index', ['id' => 0 ])->with('flash_message-danger', '不正な操作が行われました');
        }

        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

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


    //進捗更新のPOST送信処理
    public function update(Progress $progress,EditProgress $request)
    {
        $progress = Progress:: where('id', $progress->id)->first();

        //選択した子STEPがまだ進捗入力可能となっていなければ、URLに不正な値を入れられたとしてリダイレクト
        //子STEPに紐づくSTEPが削除されていれば、URLに不正な値を入れられたとしてリダイレクト
        if($progress->input_possible_flg !== 1 || $progress->challenge->delete_flg === 1){
            return back()->with('flash_message-danger', '不正な操作が行われました');
        }

        //作業時間と気付いたこと・学んだことのどちらも入力されていなければ、入力画面にリダイレクトする。
        if(empty($request->working_time) && empty($request->report)){
            return back()->with('flash_message-danger', '作業時間あるいは気付いたこと・学んだことを入力してください');
        }



        //作業時間が入力されたか確認
        //作業時間が入力された場合
        if($request->working_time) {

            //DBに登録されている合計作業時間に入力された作業時間を足して、新しい合計作業時間とする
            $total_working_time = $progress->total_working_time + $request->working_time;

            $childstep = Childstep::wherehas('progresses', function ($q) use ($progress) {
                    $q->where('id', $progress->id); })->first();

            //所要時間を合計作業時間が超えているか確認する
            //所要時間を合計作業時間が超えている場合
            if( $total_working_time >= $childstep->time_required){

                //進捗率を100%にする
                $percentage_achievement = 100;

                //completeフラグを立てる
                $progress->complete_flg = 1;

                //次の子STEPの進捗情報を取得する
                $challenge_id = $progress->challenge_id;
                $next_childstep_id = $progress->childstep_id + 1; //現在のprogress情報のchildstep_idにプラス１して次の子STEPの進捗情報を取得する
                $next_progress = Progress:: where('challenge_id', $challenge_id)->where('childstep_id', $next_childstep_id)->first();

                //次の子STEPがあるなら次の子STEPを入力可能にする
                if($next_progress){
                    $next_progress->input_possible_flg = 1;
                    $next_progress->save();
                //次の子STEPがないならそのチャレンジ全体を完了済みにする
                }else{
                    $challenge = Challenge:: where('id', $progress->challenge_id)->first();
                    $challenge->complete_flg = 1;
                    $challenge->save();
                }

            //所要時間を合計作業時間が超えていいない場合
            }else{
                //進捗率を計算する
                $percentage_achievement = $total_working_time / $childstep->time_required * 100;
            }

            $progress->percentage_achievement = $percentage_achievement;
            $progress->total_working_time = $total_working_time;
            $progress->save();
        }

        //reportが入力されたか確認
        //reportが入力された場合
        if($request->report) {
            $report = new Report();
            $report->progress_id = $progress->id;
            $report->content = $request->report;
            $report->save();
        }

        return redirect()->route('steps.detail', ['id' => $progress->childstep->step->id ])->with('flash_message-success', '進捗を更新しました');
    }
}