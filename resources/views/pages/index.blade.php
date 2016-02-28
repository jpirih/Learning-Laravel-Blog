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
        Prostor za uporbne inforamcije
    </div>
    <div class="col-sm-6">
        <h2> Trenutno ni shranjenih objav </h2>
        <p>
            Na tem mestu bodo prikazane vse blog objave
        </p>
    </div>
    <div class="col-sm-3">
        <div>
            <a href="/nova-objava" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>
                Nova objava
            </a>
        </div>
        Pregled zadnjih bojav
    </div>
@endsection