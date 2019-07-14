<?php

namespace App\Http\Controllers;

use App\Step;
use App\Childstep;
use App\Challenge;
use App\Clear;
use App\Progress;

use Illuminate\Http\Request;
use App\Http\Requests\CreateStep;
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
        if(Auth::check()){
            //詳細を閲覧しているSTEPにチャレンジしたことあるか確認する
            $challenge_exists_flg = DB::table('challenges')->where('user_id', Auth::user()->id)->where('step_id', $step->id)->exists();

            //詳細を閲覧しているSTEPにチャレンジしていた場合(一度チャレンジをやめた場合も含む)
            if( $challenge_exists_flg ) {

                //チャレンジ情報を取得する
                $challenge = Challenge :: where('user_id', Auth::user()->id)
                    ->where('step_id', $step->id)
                    ->first();

                //子STEP進捗情報があるか確認
                $progress_exists_flg = DB::table('progresses')->where('challenge_id', $challenge->id)->exists();
//                dump($childstep_progress_exists_flg);


                //子STEP進捗情報がある場合
                if( $progress_exists_flg ) {
                    $progress = Progress :: where('challenge_id', $challenge->id)
                        ->orderBy('childstep_id', 'asc')
                        ->get();

//                    dd($progress);
//
//                    $reports =





                    //子STEP進捗情報がない場合
                }else{

                }

            //詳細を閲覧しているSTEPにチャレンジしていなかった場合
            }else{

            }



        //ログインしていないならばチャレンジ関連の情報は取得しない
        }else{
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

            $step_challenge = Step::where('id',$step->id)->first();
            $step_challenge->number_of_challenger ++;
            $step_challenge->save();
        }

        return redirect()->route('steps.index', ['id' => 0 ]);

    }


    //STEPをクリアしたとき
//    public function clear(Challenge $challenge, Childstep $childstep)
//    {
//        //すでにクリア情報がDBにあるか確認
//        $clear_check = Clear :: where('childstep_id', $childstep->id)->first();
//
//        //クリア情報がDBにあって、まだクリアしていない場合、STEPクリアボタンが押されたとして、complete_flg=1にする
//        if($clear_check && $clear_check->complete_flg == 0){
//            $clear = Clear :: where('childstep_id', $childstep->id)->first();
//            $clear->complete_flg = 1;
//            $clear->save();
//
//        //クリア情報がDBにあって、すでにクリアしている場合、クリア解除ボタンが押されたとして、complete_flg=0にする
//        }elseif($clear_check && $clear_check->complete_flg == 1) {
//            $clear = Clear :: where('childstep_id', $childstep->id)->first();
//            $clear->complete_flg = 0;
//            $clear->save();
//
//        //クリア情報がDBにない場合、新規にクリア情報を登録
//        }else{
//            $clear = new Clear();
//            $clear->challenge_id = $challenge->id;
//            $clear->childstep_id = $childstep->id;
//            $clear->save();
//        }
//
//        //クリアした子STEPの数をカウントする
//        $number_of_clears = Clear :: where('challenge_id', $challenge->id)->where('complete_flg', 1)->count();
//
//        //クリアした子STEPの数が3個ならcomplete_flgを立てる(complete_flg=1)
//        if($number_of_clears === 3){
//            $challenge_of_clear = Challenge :: where('id', $challenge->id)->first();
//            $challenge_of_clear->complete_flg = 1;
//            $challenge_of_clear->save();
//        }else{
//            $challenge_of_clear = Challenge :: where('id', $challenge->id)->first();
//            $challenge_of_clear->complete_flg = 0;
//            $challenge_of_clear->save();
//        }
//
//        return redirect()->route('steps.index', ['id' => 0 ]);
//
//    }


    //STEP登録フォームの表示
    public function showCreateForm()
    {
        return view('steps/create');
    }


    /**
     * プロフィールの保存
     *
     *
     *
     * @param ProfileRequest $request
     * @return Response
     */
    //STEP登録のPOST送信処理
    public function create(CreateStep $request)
    {
            //stepモデルのインスタンスを作成する
            $step = new Step();

            //入力値を代入する
            $step->title = $request->step_title;
            $step->content = $request->step_content;
            $step->category_id = $request->step_category;

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

            return redirect()->route('steps.index', ['id' => 0 ]);

    }


    //マイページの表示
    public function mypageShow()
    {
        //サイドバー用の情報の取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        //自身がチャレンジしているSTEPの情報の取得
        $steps_my_challenge = \APP\Step::wherehas('challenges', function($q){ $q->where('user_id', Auth::user()->id); })->orderBy('created_at', 'desc')->get();



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
