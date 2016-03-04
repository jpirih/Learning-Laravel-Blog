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
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3> {{ $post->title }}</h3>
                <hr>
                <div class="well">
                    <p>
                        <span class="krepko">Id objave: </span> {{ $post->id }}
                        <span class="krepko"> | Objavlejno: </span> {{ $post->created_at }} <br>
                        <span class="krepko"> Spremenjeno: </span> {{ $post->updated_at }} <br>
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
                        {{ $post->content }}
                    </p>
                </div>


            </div>
            <div class="panel-footer">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-th-list"></span>
                    Dashboard
                </a>
                <a href="/" class="btn btn-success">
                    <span class="glyphicon glyphicon-home"></span>
                    Domov
                </a>
                <a href="{{ route('edit_post', ['id' => $post->id]) }}" class="btn btn-info">
                    <span class="glyphicon glyphicon-edit"></span>
                    Uredi
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
                        <div class="well">
                            <h4>{{ $comment->name }}</h4>
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
                        <form action="{{ route('save_comment', ['id' => $post->id]) }}" method="post" class="form-horizontal">
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