@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Feed Backs</h2>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
            <tr>
                <td>{{$value->title}}</td>
                <td>{{$value->category}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->user->name}}</td>
                <td><a href="{{ route('delete-feed-back', $value->id) }}">delete</a></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No data found</td>
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

@endsection