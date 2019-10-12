<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Forms\FileForm;
use App\Helpers\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Kris\LaravelFormBuilder\FormBuilder;

class FileController extends Controller
{
    const NOT_FOUND = 404;
    const STATUS_PRIVATE = 0;
    const STATUS_SHARED = 1;
    const STATUS_PUBLIC = 2;

    public function __construct()
    {
        $this->middleware('checkRole:*');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $id = Auth::user()->getAuthIdentifier();
        $files = File::all();
        $private_files = $files->where('id_owner', '=', $id)->sortByDesc('created_at');
        $shared_files = $files->where('status', '=', self::STATUS_SHARED)->where('id_owner', '!=', $id);
        $public_files = $files->where('status', '=', self::STATUS_PUBLIC)->where('id_owner', '!=', $id);;
        return view('pages.files', [
            'private_files' => $private_files,
            'shared_files' => $shared_files,
            'public_files' => $public_files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(FileForm::class, [
            'method' => 'POST',
            'url' => route('files.store')
        ]);
        return view('files.add', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        $params = [
            'uploaded' => false,
            'file' => null,
            'errors' => []
        ];
        $form = $formBuilder->create(FileForm::class);
        if ($form->isValid()) {
            if ($request->hasFile('file')) {
                $data = $request->all();
                /** @var UploadedFile $file */
                $file = $request->file('file');
                $f = new File();
                $f->stored_file_name = uniqid();
                $f->file_name = $data['fileName'];
                $f->size = $file->getSize();
                $f->type = $file->getClientOriginalExtension();
                $f->id_owner = Auth::user()->getAuthIdentifier();
                $f->status = $data['status'];
                $f->save();
                $file->storeAs('files', $f->stored_file_name);
                $params['uploaded'] = true;
                $params['file'] = $f;
                $params['date'] = formatDate($f->created_at);
            } else {
                $params['errors'] = [0 => [
                    'message' => Message::NO_SUBMITTED_FILE
                ]];
            }
        } else {
            $params['errors'] = [$form->getErrors()];
        }
        return response()->json($params, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @return Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id,$status)
    {
        switch ($status){
            case 0:
            case 1:
            case 2:
                break;
            default:
                $status = 0;
                break;
        }
        /** @var File $file */
        $file = File::whereId($id)->first();
        $file->status = $status;
        $file->save();
        return response()->json(['updated' => true], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param File $file
     * @return Response
     */
    public function destroy(File $file)
    {
        //
    }

    public function download($storedFilename)
    {
        if (Storage::disk('files')->exists($storedFilename)) {
            $fileInfos = File::whereStoredFileName($storedFilename)->get()->first();
            $fileName = $fileInfos->file_name . '.' . $fileInfos->type;
            if (Auth::user()->getAuthIdentifier() == $fileInfos->id_owner || $fileInfos->status == self::STATUS_PUBLIC) {
                // TODO implement shared files check
                return Storage::download('files/' . $storedFilename, $fileName);
            } else {
                return abort(self::NOT_FOUND);
            }
        } else {
            return abort(self::NOT_FOUND);
        }
    }
}
