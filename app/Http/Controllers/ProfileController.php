<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public $successStatus = 200;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        return view('profile');
    }
}
