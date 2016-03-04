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
                <p>
                    <span class="krepko">Id objave: </span> {{ $post->id }}
                </p>
                <p>
                    <span class="krepko">Datum nastanka: </span> {{ $post->created_at }} <br>
                    <span class="krepko">Datum zadnje spremembe: </span> {{ $post->updated_at }}
                </p>
                <p>
                    <span class="krepko">Vsebina Objave: </span> <br>
                    {{ $post->content }}
                </p>
            </div>
            <div class="panel-footer">
                <a href="/zbirnik-objav" class="btn btn-primary">
                    <span class="glyphicon glyphicon-th-list"></span>
                    Pregled vseh objav
                </a>
                <a href="/" class="btn btn-success">
                    <span class="glyphicon glyphicon-home"></span>
                    Domov
                </a>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-body">
                <h4>Komentariji</h4>

                @foreach($post->comments as $comment)
                <div class="well">
                    <h4>{{ $comment->name }}</h4>
                    <p>
                        {{ $comment->body }}
                    </p>
                </div>
                @endforeach
                <hr>
                <h4>Napiši Komentar</h4>
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/objava/{{ $post->id }}/komentiraj" method="post" class="form-horizontal">
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