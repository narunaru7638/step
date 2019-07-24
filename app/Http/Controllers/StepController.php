<?php

namespace App\Http\Controllers;

use App\Step;
use App\Childstep;
use App\Challenge;
use App\Clear;
use App\Progress;

use Illuminate\Http\Request;
use App\Http\Requests\CreateStep;
use App\Http\Requests\EditStep;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StepController extends Controller
{
    //カテゴリー指定しなかった場合のSTEP一覧表示
    public function index()
    {
        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        return view('steps/index', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
        ]);
    }


    //カテゴリー指定した場合のSTEP一覧表示
    public function categoryIndex(Step $step)
    {
        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        return view('steps/index', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
        ]);
    }


    //STEP詳細表示
    public function detail(Step $step)
    {
        $steps_new = null;
        $steps_rank = null;
        $step_detail = null;
        $challenge = null;
        $progress = null;
        $reports = null;
        $challenge_exists_flg = null;
        $progress_exists_flg = null;

        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        //指定されたIDのSTEPデータを取得
        $step_detail = Step::find($step->id);

        //ログインしているか確認する
        //ログインしていればそのSTEPにチャレンジしているか確認する
        if(Auth::check()){
            //詳細を閲覧しているSTEPのチャレンジ情報を取得
            $challenge_exists_flg = DB::table('challenges')->where('user_id', Auth::user()->id)->where('step_id', $step->id)->exists();

            //詳細を閲覧しているSTEPにチャレンジしているか確認(一度チャレンジしたあとにチャレンジをやめた場合も含む)
            //詳細を閲覧しているSTEPにチャレンジしている場合
            if( $challenge_exists_flg ) {
                //チャレンジ情報を取得する
                $challenge = Challenge :: where('user_id', Auth::user()->id)
                    ->where('step_id', $step->id)
                    ->first();

                //子STEP進捗情報を取得
                $progress_exists_flg = DB::table('progresses')->where('challenge_id', $challenge->id)->exists();

                //子STEP進捗情報があるか確認
                //子STEP進捗情報がある場合
                if( $progress_exists_flg ) {
                    $progress = Progress :: where('challenge_id', $challenge->id)
                        ->orderBy('childstep_id', 'asc')
                        ->get();
                }
            }
        }

        return view('steps/detail', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
            'step_detail' => $step_detail,
            'challenge' => $challenge,
            'progress' => $progress,
            'challenge_exists_flg' => $challenge_exists_flg,
            'progress_exists_flg' => $progress_exists_flg,
            'reports' => $reports,
        ]);
    }


    //STEP登録フォームの表示
    public function showCreateForm()
    {


//        $test_var = "1234asd";
//
//        return view('steps/create', [
//            'test_var' => $test_var,
//
//        ]);

        return view('steps/create');

    }


    //STEP登録のPOST送信処理
    public function create(CreateStep $request)
    {

        //stepモデルのインスタンスを作成する
        $step = new Step();

        //入力値を代入する
        $step->title = $request->step_title;
        $step->content = $request->step_content;
        $step->category_id = $request->step_category;

        //現在のログインユーザのIDをuser_idに代入する
        $step->user_id = Auth::user()->id;

        //STEPイメージ画像が送信されていた場合、画像ファイルを登録する
        if(!empty($request->file('step_img'))) {

            //ファイルの名前をハッシュ化して変数に入れる
            $file_hash_name = sha1_file($request->file('step_img'));

            //ファイルの拡張子を取得して変数に入れる
            $file_extension = $request->file('step_img')->getClientOriginalExtension();

            //DBに保存するファイル名を作成して変数に入れる
            $file_save_name = $file_hash_name . '.' . $file_extension;

            //DBにファイル名を保存する
            $step->pic_img = $file_save_name;

            //storageに画像ファイルを保存する
            $request->step_img->storeAs('public', $file_save_name);
        }

        //インスタンスの状態をデータベースに書き込む
        $step->save();

        //子STEPに関する入力値をDBに書き込む
        //number_of_childstepの数だけchildstepレコードを作成
        for ($i = 1; $i <= $request->number_of_childstep; $i++) {
            $childstep = new Childstep();

            if(!empty($request)){
                $request_title = 'childstep'.$i.'_title';
                $request_content = 'childstep'.$i.'_content';
                $childstep->title = $request->$request_title;
                $childstep->content = $request->$request_content;
                $childstep->step_id = $step->id;
                $childstep->number_of_step = $i;

                //子STEPイメージ画像が送信されていた場合、画像ファイルを登録する
                if(!empty($request->file('childstep'.$i.'_img'))){

                    $file_input_name = 'childstep'.$i.'_img';

                    //ファイルの名前をハッシュ化して変数に入れる
                    $file_hash_name = sha1_file($request->file($file_input_name));

                    //ファイルの拡張子を取得して変数に入れる
                    $file_extension = $request->file($file_input_name)->getClientOriginalExtension();

                    //DBに保存するファイル名を作成して変数に入れる
                    $file_save_name = $file_hash_name . '.' . $file_extension;

                    //DBにファイル名を保存する
                    $childstep->pic_img = $file_save_name;

                    //storageに画像ファイルを保存する
                    $request->$file_input_name->storeAs('public', $file_save_name);
                }

                $childstep->save();
            }
        }
        return redirect()->route('steps.index', ['id' => 0 ])->with('flash_message-success', 'STEPの登録に成功しました');
    }


    //STEP情報変更フォームの表示
    public function stepEditForm(Step $step)
    {
        $steps_new = null;
        $steps_rank = null;
        $step_detail = null;
        $challenge = null;
        $progress = null;
        $reports = null;
        $challenge_exists_flg = null;
        $progress_exists_flg = null;

        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        //指定されたIDのSTEPデータを取得
        $step_detail = Step::find($step->id);

        //子STEPが何個登録されているか取得
        $number_of_childstep = count($step_detail->childsteps);

        return view('steps/edit', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
            'step_detail' => $step_detail,
            'challenge' => $challenge,
            'progress' => $progress,
            'challenge_exists_flg' => $challenge_exists_flg,
            'progress_exists_flg' => $progress_exists_flg,
            'reports' => $reports,
            'number_of_childstep' => $number_of_childstep,
        ]);
    }


    //STEP情報変更のPOST送信処理
    public function edit(Step $step, EditStep $request)
    {
        $step_edit = Step:: where('id', $step->id)->first();

        //子STEP用のフォームの数と登録されている子STEPの数が一致しているか確認
        //子STEP用のフォームの数と登録されている子STEPの数が一致している場合
        if(intval($request->number_of_childstep) === count($step_edit->childsteps)){

                //STEP情報を更新
                $step_edit->content = $request->step_content;
                $step_edit->save();

                //STEPに紐づく子STEP情報を更新
                foreach($step_edit->childsteps as $key => $childstep){
                    $childstep_content_request_name = 'childstep'.($key+1).'_content';
                    $childstep->content = $request->$childstep_content_request_name;
                    $childstep->save();
                }

                //変更成功のフラッシュメッセージつきでリダイレクト
                return redirect()->route('steps.index', ['id' => 0 ])->with('flash_message-success', 'STEPの編集に成功しました');

        //子STEP用のフォームの数と登録されている子STEPの数が一致していない場合
        }else{
            //変更成功のフラッシュメッセージつきでリダイレクト
            return redirect()->route('steps.edit', ['id' => $step->id ])->with('flash_message-danger', '不正な操作が行われました。');
        };
    }


    //STEPにチャレンジしたとき
    public function challenge(Step $step)
    {
         //すでにチャレンジ情報がDBにあるか確認
        $challenge_check = Challenge :: where('user_id', Auth::user()->id)
                                        ->where('step_id', $step->id)
                                        ->first();

        //チャレンジ情報がDBにあって、かつdelete_flg=0の場合、チャレンジをやめるボタンが押されたとして、delete_flg=1にする
        if($challenge_check && $challenge_check->delete_flg == 0){
            $challenge = Challenge :: where('step_id', $step->id)->first();
            $challenge->delete_flg = 1;
            $challenge->save();

        //チャレンジ情報がDBにあって、かつdelete_flg=1の場合、チャレンジするボタンが押されたとして、delete_flg=0にする
        }elseif($challenge_check && $challenge_check->delete_flg == 1) {
            $challenge = Challenge :: where('step_id', $step->id)->first();
            $challenge->delete_flg = 0;
            $challenge->save();

        //チャレンジ情報がDBにない場合、新規にチャレンジ情報を登録
        }else{
            $challenge = new Challenge();
            $challenge->user_id = Auth::user()->id;
            $challenge->step_id = $step->id;
            $challenge->save();

            //チャレンジ情報と共に子STEP進捗情報も作成する
            $childsteps = Childstep::where('step_id', $step->id)->get();
            foreach($childsteps as $childstep) {
                $progress = new Progress();
                $progress->challenge_id = $challenge->id;
                $progress->childstep_id = $childstep->id;

                //１番目のSTEPのみは最初から進捗が入力できるようにする
                if(1 === Childstep::find($childstep->id)->number_of_step){
                    $progress->input_possible_flg = 1;
                };
                $progress->save();
            }

            //STEPにチャレンジした人の人数をプラス１する
            $step_challenge = Step::where('id',$step->id)->first();
            $step_challenge->number_of_challenger ++;
            $step_challenge->save();
        }

        return redirect()->route('steps.detail', ['id' => $step->id ]);
    }


    //マイページの表示
    public function mypageShow()
    {
        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        //自身がチャレンジしているSTEPの情報の取得
//        $steps_my_challenge = \APP\Step::wherehas('challenges', function($q){ $q->where('user_id', Auth::user()->id); })->orderBy('created_at', 'desc')->get();
        $steps_my_challenge = \APP\Step::wherehas('challenges', function($q){ $q->where('user_id', Auth::user()->id); })->wherehas('challenges', function($q){ $q->where('delete_flg', 0); })->orderBy('created_at', 'desc')->get();


        //自身が登録したSTEPの情報の取得
        $steps_my_regist = Step::where('user_id', Auth::user()->id )->orderBy('created_at', 'desc')->get();

        return view('steps/mypage', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
            'steps_my_challenge' => $steps_my_challenge,
            'steps_my_regist' => $steps_my_regist,
        ]);
    }
}
