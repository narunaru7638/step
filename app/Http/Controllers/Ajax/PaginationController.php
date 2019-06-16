<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaginationController extends Controller
{
    public function index()
    {

        return \App\Item::paginate(10);

    }
}