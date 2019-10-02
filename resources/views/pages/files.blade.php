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
                        @include('files.table',['files'=>$public_files,'status'=>'public'])
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
                        @include('files.table',['files'=>$shared_files,'status'=>'shared'])
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
                        @include('files.table',['files'=>$private_files,'status'=>'private'])
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="m_add-file"></div>
    <div class="modal fade" id="m_share-file"></div>
@endsection
