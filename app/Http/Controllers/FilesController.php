<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Forms\FileForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;

class FilesController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        return view('files');
    }

    public function viewAdd(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(FileForm::class, [
            'method' => 'POST',
            'url' => route('files')
        ]);
        return view('files/add', compact('form'));
    }

    public function add(Request $request)
    {
        dd($request);

    }

    public function getByUser(Request $request)
    {

    }

    public function toggleStatus(Request $request)
    {

    }

    public function getName(Request $request)
    {

    }

    public function getPublics(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }

    public function deleteUserFiles(Request $request)
    {

    }
}
