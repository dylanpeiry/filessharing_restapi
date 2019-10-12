<thead>
<tr>
    <th>Name</th>
    <th>Status</th>
    <th>Date</th>
    <th>Size</th>
    @if($status === 'private')
        <th>Action</th>
    @else
        <th>Owner</th>
    @endif
</tr>
</thead>
<tbody>
@foreach($files as $file)
    <tr id="{{$file->id}}">
        <td>{!! downloadLink($file->file_name . '.' . $file->type,route('files.download',[$file->stored_file_name])) !!}</td>
        <td>{!!getStatusName($file->status)!!}</td>
        <td>{{formatDate($file->created_at)}}</td>
        <td>{{formatSize($file->size)}}</td>
        @if($status === 'private')
            <td>
                <i class="fas fa-trash deletefile" title="Delete the file"></i>
                &nbsp;
                <i class="fas fa-user-plus sharefile" title="Share the file"></i>
            </td>
        @endif
    </tr>
@endforeach
</tbody>
