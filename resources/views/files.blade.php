@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border border-primary">
            <div class="card-header bg-primary text-white font-weight-bold">Public files</div>
            <div class="card-body myfiles">
                <table class="table table-sm">
                    @if(count($public_files) == 0)
                        <div class="alert alert-primary" role="alert">No public files.</div>
                    @else
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($public_files as $file)
                            <tr>
                                <td>{!! downloadLink($file->file_name . '.' . $file->type,route('files.download',[$file->stored_file_name])) !!}</td>
                                <td>{!!getStatusName($file->status)!!}</td>
                                <td>{{formatDate($file->created_at)}}</td>
                                <td>{{$file->size}}</td>
                                <td>
                                    <i class="fas fa-trash deletefile" title="Delete the file"></i>
                                    &nbsp;
                                    <i class="fas fa-user-plus sharefile" title="Share the file"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
        <br>
        <div class="card border border-warning">
            <div class="card-header bg-warning font-weight-bold">Shared Files</div>
            <div class="card-body myfiles">
                <table class="table table-sm">
                    @if(count($shared_files) == 0)
                        <div class="alert alert-warning" role="alert">No files are shared with you.</div>
                    @else
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shared_files as $file)
                            <tr>
                                <td>{!! downloadLink($file->file_name . '.' . $file->type,route('files.download',[$file->stored_file_name])) !!}</td>
                                <td>{!!getStatusName($file->status)!!}</td>
                                <td>{{formatDate($file->created_at)}}</td>
                                <td>{{$file->size}}</td>
                                <td>
                                    <i class="fas fa-trash deletefile" title="Delete the file"></i>
                                    &nbsp;
                                    <i class="fas fa-user-plus sharefile" title="Share the file"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
        <br>
        <div class="card border border-danger">
            <div class="card-header bg-danger text-white font-weight-bold">Browse my files
                <i class="fas fa-plus fa-lg float-right align-content-center" id="fileUpload" title="Add a file"
                   style="line-height: normal;"></i>
            </div>
            <div class="card-body myfiles mf-private">
                <table class="table table-sm">
                    @if(count($private_files) == 0)
                        <div class="alert alert-danger" role="alert">You have no files.</div>
                    @else
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($private_files as $file)
                            <tr>
                                <td>{!! downloadLink($file->file_name . '.' . $file->type,route('files.download',[$file->stored_file_name])) !!}</td>
                                <td>{!!getStatusName($file->status)!!}</td>
                                <td>{{formatDate($file->created_at)}}</td>
                                <td>{{$file->size}}</td>
                                <td>
                                    <i class="fas fa-trash deletefile" title="Delete the file"></i>
                                    &nbsp;
                                    <i class="fas fa-user-plus sharefile" title="Share the file"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <!-- Popup partage d'un fichier -->
    <div class="modal fade" id="modalFileShare" tabindex="-1" role="dialog" aria-labelledby="fileNameLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form enctype="multipart/form-data" method="post" action="process.php?e=share">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fileNameLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="users" class="col-form-label">Partager le fichier :</label>
                        <div class="form-group shareselect">
                        </div>
                        <label for="toggleStatus">Statut :</label>
                        <div class="toggleStatus">
                            <div class="btn-group btn-group-toggle status-toggle" data-toggle="buttons">
                                <label class="btn btn-danger active">
                                    <input type="radio" name="status" id="private" autocomplete="off" value="0"> Privé
                                </label>
                                <label class="btn btn-warning">
                                    <input type="radio" name="status" id="shared" autocomplete="off" value="1"> Partagé
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="status" id="public" autocomplete="off" value="2"> Public
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="" id="idFile" name="idFile">
                        <input type="hidden" value="" id="usersToAdd" name="usersToAdd">
                        <input type="hidden" value="" id="usersToDelete" name="usersToDelete">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" id="share">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
