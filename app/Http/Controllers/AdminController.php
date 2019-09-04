<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request){
        return view('admin');
    }
}
