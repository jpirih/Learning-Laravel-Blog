@extends('base')

@section('title')
    Podrobnosti ojave
@endsection

@section('page-heading')
    Podrobnosti objave
@endsection

@section('description')
    Na tem mestu so dostopni vsi podatki o posamezni objavi
@endsection

@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @if(session('status'))
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-check"></span>

                {{session('status')}}
            </div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3> {{ $post->title }}</h3>
                <hr>
                <div class="well">
                    <p>
                        <span class="krepko">Id objave: </span> {{ $post->id }}
                        <span class="krepko"> | Napisano: </span> {{ $post->created_at->format('d.M.Y H:i:s') }} <br>
                        <span class="krepko">Objavljeno:</span> {{ $post->date_published}}<br>
                        <span class="krepko"> Zadnja sprememba: </span> {{ $post->updated_at->diffForHumans()}} <br>
                        <span class="krepko">Kategorije:  </span>
                        @foreach($post->categories as $category )
                            <span>
                                <span>{{ $category->name }}, </span>
                            </span>
                        @endforeach
                    </p>
                    <hr>
                    <span class="krepko">Vsebina Objave: </span>
                    <p>
                        {{ $post->body }}
                    </p>
                </div>


            </div>
            <div class="panel-footer">
                <a href="{{ route('blog') }}" class="btn btn-success">
                    <span class="glyphicon glyphicon-home"></span>
                    Domov
                </a>
                <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-info">
                    <span class="glyphicon glyphicon-edit"></span>
                    Uredi
                </a>
                <a href="{{ route('posts.delete', ['id' => $post->id]) }}" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                    Izbriši
                </a>

            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Komentariji</h3>
                @if(count($post->comments) == 0)
                    <div class="well">
                        <p>
                            Za to objavo ni komentarjev Bodi prvi in napiši komentar
                        </p>
                    </div>
                @else
                    @foreach($post->comments as $comment)
                        <div class="comment-box">
                            <h4>{{ $comment->name }}</h4>
                            <p>
                                <span class="text-muted">Objavljeno: {{ $comment->created_at->format('d.m.y @ H:i:s') }} by {{ $comment->user->nickname }}</span>
                            </p>
                            <p>
                                {{ $comment->body }}
                            </p>
                        </div>
                    @endforeach
                @endif


                <hr>
                <h3>Napiši Komentar</h3>
                <div class="row">
                    <div class="col-sm-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('comments.store', ['id' => $post->id]) }}" method="post" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Zadeva</label>
                                <div class="col-sm-8">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="body" class="col-sm-2 control-label">Komentar</label>
                                <div class="col-sm-8">
                        <textarea name="body" id="body" cols="30" rows="5" class="form-control">

                        </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button type="submit" class="btn btn-success btn-block">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        Kmentiraj
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection