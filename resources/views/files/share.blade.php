<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$file->file_name . '.' . $file->type}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! form_start($form) !!}
                {!! form_widget($form->id) !!}
                <div class="row">
                    <div class="col-12">{!! form_label($form->users) !!}</div>
                </div>
                <div class="row">
                    <div class="col-12">{!! form_widget($form->users) !!}</div>
                </div>
                <div class="row">
                    <div class="col-12">{!! form_label($form->status) !!}</div>
                </div>
                <div class="row">
                    <div class="col-12">{!! form_widget($form->status) !!}</div>
                </div>
                {!! form_end($form, false) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="share">Save</button>
            </div>
        </div>
</div>
