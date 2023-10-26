@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Add Feed Back') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add-feed-back') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category"
                                class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control @error('category') is-invalid @enderror"
                                    name="category" value="{{ old('category') }}" required autocomplete="category">
                                    <option value="">--select category--</option>
                                    <option value="bug report">Bug Report</option>
                                    <option value="feature request">Feature Request</option>
                                    <option value="improvement">Improvement</option>
                                </select>

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-12">
                                <textarea id="description"
                                    class="ckeditor form-control @error('description') is-invalid @enderror"
                                    name="description" required autocomplete="description"></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add FeedBack') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Feed Back') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Feed back lisitng -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                <div class="card-body p-4">
                                    @if(!empty($data) && $data->count())
                                    @foreach($data as $key => $value)
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h4 style="width:90%;float:left">{{$value->title}}</h4>
                                            <a style="float:right;"
                                                href="{{ route('feed-back-detail', $value->id) }}">detail</a>
                                        </div>
                                        <div class="card-body">
                                            {!!$value->description!!}
                                            <p>Category: {{$value->category}}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                                                        alt="avatar" width="25" height="25" /> -->
                                                    <p class="small mb-0 ms-2">Created By: {{$value->user->name}}</p>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <p class="small text-muted mb-0">Upvote?</p>
                                                    <i class="far fa-thumbs-up mx-2 fa-xs text-black"
                                                        style="margin-top: -0.16rem;"></i>
                                                    <p class="small text-muted mb-0">4</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p>No data found</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end -->
                </div>
            </div>
            <div class="container mt-5">
                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection