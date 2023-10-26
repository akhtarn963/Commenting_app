@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Users</h2>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($users) && $users->count())
            @foreach($users as $key => $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td><a href="{{ route('delete-user', $value->id) }}">delete</a></td>
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
            {!! $users->links() !!}
        </div>
    </div>
</div>

@endsection