@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Comments</h2>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->comment}}</td>
                <td>{{$value->status}}</td>
                <td><select name="status" data-url="{{url('/admin')}}" data-id="{{$value->id}}"
                        data-token="{{ csrf_token() }}">
                        <option value="Y" @if($value->status == 'Y') selected="selected"@endif>Active</option>
                        <option value="N" @if($value->status == 'N') selected="selected"@endif>Inactive</option>
                    </select></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3">No data found</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            {!! $data->links() !!}
        </div>
    </div>
</div>

<script type="text/javascript">
$('select').on('change', function() {
    var status = $(this).val();
    var token = $(this).data('token');
    var base_url = $(this).data('url');
    var id = $(this).data('id');
    $.ajax({
        url: base_url + '/update_status',
        type: 'POST',
        data: {
            _token: token,
            status: status,
            id: id
        },
        success: function(msg) {
            //alert("success");
            location.reload();
        }
    });


})
</script>
@endsection