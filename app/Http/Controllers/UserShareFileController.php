<?php

namespace App\Http\Controllers;

use App\File;
use App\Forms\UserShareFileForm;
use App\Http\Forms\FileForm;
use App\UserShareFile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;

class UserShareFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @param $fileId
     * @return Response
     */
    public function create(FormBuilder $formBuilder, $id)
    {
        $file = File::whereId($id)->first();
        $form = $formBuilder->create(UserShareFileForm::class, [
            'method' => 'POST',
            'url' => route('files.share.store', ['id' => $id]),
            'model'=>$file
        ]);
        return view('files.share', compact(['form', 'file']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request,$id)
    {
        $users = $request->get('users');
        //

    }

    /**
     * Display the specified resource.
     *
     * @param UserShareFile $userShareFile
     * @return Response
     */
    public function show(UserShareFile $userShareFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserShareFile $userShareFile
     * @return Response
     */
    public function edit(UserShareFile $userShareFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UserShareFile $userShareFile
     * @return Response
     */
    public function update(Request $request, UserShareFile $userShareFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserShareFile $userShareFile
     * @return Response
     */
    public function destroy(UserShareFile $userShareFile)
    {
        //
    }
}
