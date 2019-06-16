<?php

namespace App\Http\Controllers;

use App\User;


use Illuminate\Http\Request;
use App\Http\Requests\EditProfile;
use App\Http\Requests\EditPassword;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


class UserController extends Controller
{
    public function showEditForm()
    {
        return view('user/profile');
    }

    public function editProfile(EditProfile $request)
    {
        $user = User :: where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        $user->pic_icon = $request->pic_icon;
        $user->save();

        return redirect()->route('steps.index', ['id' => 0 ]);
    }

    public function passwordEditForm()
    {
        return view('user/password-edit');
    }

    public function editPassword(EditPassword $request)
    {
//        dd('test');
        if(Hash::check($request->password_old, Auth::user()->password)){
//            dd('true');
            $user = User :: where('id', Auth::user()->id)->first();
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('steps.index', ['id' => 0 ]);
        }else{
//            dd('false');
//            return Response::make('not mach password');
//            return redirect()->back()->withErrors()->withInput();
//            return redirect()->route('password.edit');
//            dd($errors);
            $error_msg = '登録されている古いパスワードと一致しません。';
            return redirect('edit-password')->with('db_pass_check', $error_msg)->withInput();
//            return redirect()->route('password.edit', ['db_pass_check' => 0])->withInput();


        }


//
        //        $user = User :: where('id', Auth::user()->id)->first();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->profile = $request->profile;
//        $user->pic_icon = $request->pic_icon;
//        $user->save();
//
    }



}
