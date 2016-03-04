@extends('base')

@section('title')
    Glavna stran
@endsection
        <!-- glavni naslov strani -->
@section('page-heading')
    Moje pisarije - pregeld vseh
@endsection

        <!-- opis pod naslovom -->
@section('description')
    Zdravo znašel si se na mojem blogu na njem bom pisal samo lepe stvari,
    vse kar se mi bo pozitivnega zgodilo :)
@endsection

@section('content')
        <!-- levi stolpec opozorilo blog v izdelavi -->
    <div class="col-sm-3">
       <h4>Prostor za uporabne informacije</h4>
        <div class="alert alert-warning">
            <p>
                <span class="krepko">Blog v izdelavi: </span>
                Pozdravljen/-a na mojem blogu, ki je še vedno v

            </p>
            <p>
                Trenutno omogoča pisanje novih objav, pregled posamezne objave,
                seznam zadnjih treh, in zbirni pregled vseh objav. Se nadaljuje ...
            </p>
        </div>
    </div>
    <!--  osrednji del seznam vseh objav veliki modri box-i-->
    <div class="col-sm-6">
        <!-- za prikazovanje skrbi SiteController -> funkcija index() -->
        @foreach($posts as $post)
            <div class="well post">
                    <h2> {{ $post->title }} </h2>
                    <p>
                        {{ $post->content }}
                    </p>
                <p>
                    <a href="{{ route('details', ['id' => $post->id]) }}" class="btn-primary btn">
                        Podrobnosti ...
                    </a>
                </p>
            </div>
        @endforeach
    </div>
    <!-- desni meni Gumb za nove objave -->
    <div class="col-sm-3">
        <div>
            <a href="{{ route('new_post') }}" class="btn btn-block btn-success"><span class="glyphicon glyphicon-plus"></span>
                Nova objava
            </a>
        </div>
        <hr>
        <!-- tabela najnovejši trije za prikazovanje skrbi SiteController ->index funkcija -->
        <h4>Najnovejše tri</h4>
        <table class="table table-responsive table-bordered">
            <tr>
                <th>Naslov</th>
                <th>Objavlejno</th>
            </tr>
            @foreach($newPosts as $item)
                <tr>
                    <td><a href="{{ route('details', ['id' => $item->id])  }}">{{ $item->title }}</a></td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach

        </table>
        <!-- link na tabelo vseh objav  -->
        <a href="/zbirnik-objav" class="btn btn-primary btn-block">
            <span class="glyphicon glyphicon-th-list"></span>
            Pregled vseh objav
        </a>
    </div>
@endsection