<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComedianController extends Controller
{
    //
    public function index() {

        return \App\Comedian::all();  // ←自動でjsonにしてくれます

    }
}
