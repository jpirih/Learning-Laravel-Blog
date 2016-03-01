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
    </div>
@endsection