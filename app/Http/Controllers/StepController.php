<?php

namespace App\Http\Controllers;

use App\Step;
use App\Childstep;
use App\Challenge;
use App\Clear;

use Illuminate\Http\Request;
use App\Http\Requests\CreateStep;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class StepController extends Controller
{

    public function index()
    {
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        return view('steps/index', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
        ]);
    }

    public function categoryIndex(Step $step)
    {
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        return view('steps/index', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
        ]);
    }


    public function detail(Step $step)
    {
        //sidebar用のstepsデータを取得
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();
        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();

        //すでにチャレンジ済みかデータを取得して確認
        $step_detail = Step::find($step->id);


        if(Auth::check()){
            $challenge_exists_flg = DB::table('challenges')->where('user_id', Auth::user()->id)->where('step_id', $step->id)->exists();
            if( $challenge_exists_flg ) {

                $challenge = Challenge :: where('user_id', Auth::user()->id)
                    ->where('step_id', $step->id)
                    ->first();

                if( DB::table('clears')->where('challenge_id', $challenge->id)->exists() ) {
                    $clear = Clear :: where('challenge_id', $challenge->id)
                        ->orderBy('childstep_id', 'asc')
                        ->get();
                }else{
                    $clear = [new Clear, new Clear, new Clear];
                }
            }else{
                $challenge = new Challenge;
                $clear = [new Clear, new Clear, new Clear];

            }

            return view('steps/detail', [
                'steps_new' => $steps_new,
                'steps_rank' => $steps_rank,
                'step_detail' => $step_detail,
                'challenge' => $challenge,
                'clear' => $clear,
                'challenge_exists_flg' => $challenge_exists_flg,
            ]);

        }else{
            return view('steps/detail', [
                'steps_new' => $steps_new,
                'steps_rank' => $steps_rank,
                'step_detail' => $step_detail,
            ]);
        }




    }

    public function challenge(Step $step)
    {
         //すでにチャレンジ情報がDBにあるか確認
        $challenge_check = Challenge :: where('user_id', Auth::user()->id)
                                        ->where('step_id', $step->id)
                                        ->first();

        //チャレンジ情報がDBにあって、まだリタイアしていない場合、リタイアボタンが押されたとして、delete_flg=1にする
        if($challenge_check && $challenge_check->delete_flg == 0){
            $challenge = Challenge :: where('step_id', $step->id)->first();
            $challenge->delete_flg = 1;
            $challenge->save();
        //チャレンジ情報がDBにあって、すでにリタイアしている場合、再度チャレンジボタンが押されたとして、delete_flg=0にする
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


            //チャレンジ情報と共にクリア情報も作成する
            $childsteps = Childstep::where('step_id', $step->id)->get();
            foreach($childsteps as $childstep) {
                $clear = new Clear();
                $clear->challenge_id = $challenge->id;
                $clear->childstep_id = $childstep->id;
                $clear->save();
            }

            $step_challenge = Step::where('id',$step->id)->first();
            $step_challenge->number_of_challenger ++;
            $step_challenge->save();

        }




        return redirect()->route('steps.index', ['id' => 0 ]);
    }

    public function clear(Challenge $challenge, Childstep $childstep)
    {
        //すでにクリア情報がDBにあるか確認
        $clear_check = Clear :: where('childstep_id', $childstep->id)->first();
//        dd($clear_check);




        //クリア情報がDBにあって、まだクリアしていない場合、STEPクリアボタンが押されたとして、complete_flg=1にする
        if($clear_check && $clear_check->complete_flg == 0){
            $clear = Clear :: where('childstep_id', $childstep->id)->first();
            $clear->complete_flg = 1;
            $clear->save();



            //クリア情報がDBにあって、すでにクリアしている場合、クリア解除ボタンが押されたとして、complete_flg=0にする
        }elseif($clear_check && $clear_check->complete_flg == 1) {
            $clear = Clear :: where('childstep_id', $childstep->id)->first();
            $clear->complete_flg = 0;
            $clear->save();
            //クリア情報がDBにない場合、新規にクリア情報を登録
        }else{
            $clear = new Clear();
            $clear->challenge_id = $challenge->id;
            $clear->childstep_id = $childstep->id;
            $clear->save();
        }

        $number_of_clears = Clear :: where('challenge_id', $challenge->id)->where('complete_flg', 1)->count();

//        dd($number_of_clears);

        if($number_of_clears === 3){
            $challenge_of_clear = Challenge :: where('id', $challenge->id)->first();
            $challenge_of_clear->complete_flg = 1;
            $challenge_of_clear->save();


        }else{
            $challenge_of_clear = Challenge :: where('id', $challenge->id)->first();
            $challenge_of_clear->complete_flg = 0;
            $challenge_of_clear->save();
        }

//        foreach( $clears as $clear){
//            $clear_check = $clear->complete_flg;
////            dd($clear_check);
//
//
//        }

        return redirect()->route('steps.index', ['id' => 0 ]);
        //
//        //チャレンジ情報がDBにあって、まだリタイアしていない場合、リタイアボタンが押されたとして、delete_flg=1にする
//        if($challenge_check && $challenge_check->delete_flg == 0){
//            $challenge = Challenge :: where('step_id', $id)->first();
//            $challenge->delete_flg = 1;
//            $challenge->save();
//            //チャレンジ情報がDBにあって、すでにリタイアしている場合、再度チャレンジボタンが押されたとして、delete_flg=0にする
//        }elseif($challenge_check && $challenge_check->delete_flg == 1) {
//            $challenge = Challenge :: where('step_id', $id)->first();
//            $challenge->delete_flg = 0;
//            $challenge->save();
//            //チャレンジ情報がDBにない場合、新規にチャレンジ情報を登録
//        }else{
//            $challenge = new Challenge();
//            $challenge->user_id = Auth::user()->id;
//            $challenge->step_id = $id;
//            $challenge->save();
//        }
//        return redirect()->route('steps.index');
    }


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
    public function create(CreateStep $request)
    {
            //stepモデルのインスタンスを作成する
            $step = new Step();

            //入力値を代入する
            $step->title = $request->step_title;
            $step->content = $request->step_content;
            $step->category_id = $request->step_category;
            $step->user_id = Auth::user()->id;


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

            //childstepに関する入力値をDBに書き込む
            for ($i = 1; $i <= 3; $i++) {
                $childstep = new Childstep();
                $request_title = 'childstep'.$i.'_title';
                $request_content = 'childstep'.$i.'_content';
                $childstep->title = $request->$request_title;
                $childstep->content = $request->$request_content;
                $childstep->step_id = $step->id;
                $childstep->number_of_step = $i;

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

            return redirect()->route('steps.index', ['id' => 0 ]);

    }

    public function mypageShow()
    {

        //sidebar用のstepsデータを取得
//        $steps = Step::orderBy('created_at', 'desc')->get();
        $steps_new = Step::orderBy('created_at', 'desc')->take(5)->get();

        $steps_rank = Step::orderBy('number_of_challenger', 'desc')->take(5)->get();


        $steps_my_challenge = \APP\Step::wherehas('challenges', function($q){ $q->where('user_id', Auth::user()->id); })->orderBy('created_at', 'desc')->get();
//        $steps_my_challenge = \APP\Step::wherehas('challenges', function($q){ $q->where('user_id', Auth::user()->id); })->orderBy('created_at', 'desc')->get();

//        $steps_my_challenge->cha

        $steps_my_regist = Step::where('user_id', Auth::user()->id )->orderBy('created_at', 'desc')->get();


//        dd($steps_my_challenge);

//        $steps_my_challenge = \APP\Step::wherehas('challenges', function($q){ $q->where('user_id', Auth::user()->id); })->orderBy('created_at', 'desc')->paginate(10);
//        $steps_my_regist = Step::where('user_id', Auth::user()->id )->orderBy('created_at', 'desc')->paginate(10);


//        dd($steps_my_challenge);

        return view('steps/mypage', [
            'steps_new' => $steps_new,
            'steps_rank' => $steps_rank,
            'steps_my_challenge' => $steps_my_challenge,
            'steps_my_regist' => $steps_my_regist,

//            'step' => $step,
//            'challenge' => $challenge,
//            'clear' => $clear,
//            'challenge_exists_flg' => $challenge_exists_flg,
        ]);


    }


}
