@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Feed Back Detail') }}</div>

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

        </div>
        <div class="col-md-8 mt-3">
            <h1>Comments</h1>
            <section style="">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-10 col-xl-12">
                            @if(!empty($comments) && $comments->count())
                            @foreach($comments as $key => $value)
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <div>
                                            <h6 class="fw-bold text-primary mb-1">{{$value->name}}</h6>
                                            <p class="text-muted small mb-0">
                                                {{$value->created_at}}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-4 pb-2">
                                        {!! $value->comment !!}
                                    </p>
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
            </section>
            <div class="container mt-5">
                <div class="d-flex justify-content-center">
                    {!! $comments->links() !!}
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Leave a Comment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add-comment') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md">{{ __('Comment') }}</label>
                            <div class="col-md-12">
                                <textarea id="comment"
                                    class="ckeditor form-control @error('comment') is-invalid @enderror" name="comment"
                                    required autocomplete="comment"></textarea>

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="hidden" name="feed_back_id"
                                    value="{{(!empty($data) && $data->count()) ?$data[0]->id : 0}}" />
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Comment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin">
</script>
<script>
tinymce.init({
    selector: "#comment",
    plugins: "emoticons",
    toolbar: "emoticons",
    toolbar_location: "bottom",
    menubar: false
});
</script>
@endsection