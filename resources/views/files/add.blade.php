<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add a file</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! form_start($form, ['id'=>'f_add-file']) !!}
            <div class="form-group">
                <label for="inputFile" class="control-label">File</label>
                <div class="custom-file">
                    {!! form_widget($form->file, ['attr'=>['class'=>'custom-file-input','id'=>'inputFile']]) !!}
                    <label class="custom-file-label" for="input_file">Choose file</label>
                </div>
            </div>
            {!! form_end($form) !!}
        </div>
        <div class="modal-footer">
            <button id="b_add-file" type="submit" class="btn btn-primary" form="f_add-file">Add file</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

