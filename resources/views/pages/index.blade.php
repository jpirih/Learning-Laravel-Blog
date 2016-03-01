@extends('base')

@section('title')
    Glavna stran
@endsection

@section('page-heading')
    Moje pisarije - pregeld vseh
@endsection

@section('description')
    Zdravo znašel si se na mojem blogu na njem bom pisal samo lepe stvari,
    vse kar se mi bo pozitivnega zgodilo :)
@endsection

@section('content')
    <div class="col-sm-3">
       <h4>Prostor za uporabne informacije</h4>
        <div class="alert alert-warning">
            <p>
                <span class="krepko">Blog v izdelavi: </span>
                Pozdravljen/-a na mojem blogu, ki je še vedno v
                izdealvi.
            </p>
            <p>
                Trenutno omogoča pisanje novih objav, pregled posamezne objave,
                seznam zadnjih treh, in zbirni pregled vseh objav. Se nadaljuje ...
            </p>
        </div>
    </div>
    <div class="col-sm-6">
        @foreach($posts as $post)
            <div class="well">

                    <h2> {{ $post->title }} </h2>
                    <p>
                        {{ $post->content }}
                    </p>
            </div>
        @endforeach
    </div>
    <div class="col-sm-3">
        <div>
            <a href="/nova-objava" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>
                Nova objava
            </a>
        </div>
        <hr>
        <h4>Najnovejše tri</h4>
        <table class="table table-responsive table-bordered">
            <tr>
                <th>Naslov</th>
                <th>Objavlejno</th>
            </tr>
            @foreach($newPosts as $item)
                <tr>
                    <td><a href="/objava/{{ $item->id }}">{{ $item->title }}</a></td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach

        </table>

        <a href="/zbirnik-objav" class="btn btn-primary btn-block">
            <span class="glyphicon glyphicon-th-list"></span>
            Pregled vseh objav
        </a>
    </div>
@endsection