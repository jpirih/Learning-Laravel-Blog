@extends('base')

@section('title')
    Comments overview
@endsection

@section('page-heading')
    Blog comments Overwiev
@endsection
@section('content')

        @foreach($comments as $comment)
            <div class="col-sm-6 col-md-4">
                <div class="comment-box">
                    <h4>{{ $comment->name }}</h4>
                    <p>
                        <span class="text-muted">{{ $comment->user->nickname }}</span>
                        <span class="text-muted pull-right">{{ $comment->created_at->format('d.m.y@H:i:s')  }} </span>
                    </p>
                    <p class="krepko">{{ $comment->body }}</p>
                    <hr>
                    <p>
                        <span class="text-muted" >Post title:</span> {{ $comment->post->title }} <br>
                        <span class="text-muted"> Post author</span>: {{ $comment->post->user->nickname }}
                    </p>
                </div>
            </div>
        @endforeach

@endsection