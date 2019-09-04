<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request){
        return view('files');
    }


    public function get(Request $request)
    {


        $files = [
            [
                'id' => 1,
                'storedFileName' => 'test',
                'fileName' => 'test.txt',
                'size' => 200,
                'type' => '.txt',
                'status' => 1,
                'idOwner' => 1,
            ],
            [
                'id' => 2,
                'storedFileName' => 'test2',
                'fileName' => 'test2.txt',
                'size' => 300,
                'type' => '.txt',
                'status' => 0,
                'idOwner' => 1,
            ]
        ];
        $user = Auth::user();
        return response()->json(['success' => $files], $this->successStatus);
    }
}
