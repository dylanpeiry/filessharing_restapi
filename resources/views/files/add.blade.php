<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add a file</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! form_start($form) !!}
            <div class="input-group">
                <div class="custom-file">
                    {!! form_widget($form->file, ['attr'=>['class'=>'custom-file-input','id'=>'input_file']]) !!}
                    <label class="custom-file-label" for="input_file">Choose file</label>
                </div>
            </div>
            {!! form_end($form) !!}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

